import curses
import os  # Used to clear the terminal after the game
import random  # Used to generate random positions for the fruit
import time  # Used to display the final message before exiting

# Main game loop


def game_loop(window, game_speed):
    """
    Main loop to run the Snake game.

    :param window: The curses window object.
    :param game_speed: Speed of the game in milliseconds.
    """
    curses.curs_set(0)  # Hide the cursor for a better game experience

    # Initialize the snake and its starting position
    snake = [
        [10, 15],
        [9, 15],
        [8, 15],
        [7, 15],
    ]

    # Generate the first fruit at a random position
    fruit = get_new_fruit(window=window)

    current_direction = curses.KEY_DOWN  # Snake starts moving down
    snake_ate_fruit = False  # Track if the snake eats a fruit
    score = 0  # Keep track of the score

    while True:
        # Redraw the screen and game elements
        draw_screen(window=window)
        draw_snake(snake=snake, window=window)
        draw_actor(actor=fruit, window=window, char=curses.ACS_DIAMOND)

        # Get the player's input for direction
        direction = get_new_direction(window=window, timeout=game_speed)

        # If no valid input is received, keep moving in the current direction
        if direction is None:
            direction = current_direction

        # Prevent the snake from reversing into itself
        if direction_is_opposite(direction=direction, current_direction=current_direction):
            direction = current_direction

        # Move the snake in the current direction
        move_snake(snake=snake, direction=direction,
                   snake_ate_fruit=snake_ate_fruit)

        # Check for collisions
        if snake_hit_border(snake=snake, window=window) or snake_hit_itself(snake=snake):
            break

        # Check if the snake eats the fruit
        if snake_hit_fruit(snake=snake, fruit=fruit):
            snake_ate_fruit = True
            fruit = get_new_fruit(window=window)  # Generate a new fruit
            score += 1  # Update the score
        else:
            snake_ate_fruit = False

        current_direction = direction  # Update the current direction

    # End the game and show the score
    finish_game(score=score, window=window)


def finish_game(score, window):
    """
    Display the final game-over message and the player's score.

    :param score: The total score achieved by the player.
    :param window: The curses window object.
    """
    height, width = window.getmaxyx()  # Get window dimensions
    final_message = f"GAME OVER! You won {score} fruits."
    y = int(height / 2)  # Center the message vertically
    # Center the message horizontally
    x = int((width - len(final_message)) / 2)
    window.addstr(y, x, final_message)  # Display the final message
    window.refresh()
    time.sleep(4)  # Pause for 4 seconds before exiting


def direction_is_opposite(direction, current_direction):
    """
    Check if the new direction is opposite to the current direction.

    :param direction: The new direction.
    :param current_direction: The current direction of the snake.
    :return: True if the directions are opposite, False otherwise.
    """
    match direction:
        case curses.KEY_UP:
            return current_direction == curses.KEY_DOWN
        case curses.KEY_DOWN:
            return current_direction == curses.KEY_UP
        case curses.KEY_LEFT:
            return current_direction == curses.KEY_RIGHT
        case curses.KEY_RIGHT:
            return current_direction == curses.KEY_LEFT


def get_new_fruit(window):
    """
    Generate a new fruit at a random position within the game area.

    :param window: The curses window object.
    :return: A list [y, x] representing the fruit's position.
    """
    height, width = window.getmaxyx()
    return [random.randint(1, height - 2), random.randint(1, width - 2)]


def snake_hit_border(snake, window):
    """
    Check if the snake's head hits the border.

    :param snake: List of the snake's body coordinates.
    :param window: The curses window object.
    :return: True if the snake hits the border, False otherwise.
    """
    head = snake[0]
    return actor_hit_border(actor=head, window=window)


def snake_hit_fruit(snake, fruit):
    """
    Check if the snake's head is on the fruit.

    :param snake: List of the snake's body coordinates.
    :param fruit: Coordinates of the fruit.
    :return: True if the snake eats the fruit, False otherwise.
    """
    return fruit in snake


def snake_hit_itself(snake):
    """
    Check if the snake's head collides with its own body.

    :param snake: List of the snake's body coordinates.
    :return: True if the snake hits itself, False otherwise.
    """
    head = snake[0]
    body = snake[1:]
    return head in body


def draw_screen(window):
    """
    Clear the screen and redraw the border.

    :param window: The curses window object.
    """
    window.clear()
    window.border(0)  # Show the terminal border


def draw_snake(snake, window):
    """
    Draw the snake on the screen.

    :param snake: List of the snake's body coordinates.
    :param window: The curses window object.
    """
    head = snake[0]  # Get the head of the snake
    draw_actor(actor=head, window=window, char="@")  # Draw the head
    body = snake[1:]  # Get the body of the snake
    for body_part in body:
        draw_actor(actor=body_part, window=window, char="s")  # Draw the body


def draw_actor(actor, window, char):
    """
    Draw a character at the actor's position on the screen.

    :param actor: [y, x] position of the actor.
    :param window: The curses window object.
    :param char: The character to draw.
    """
    window.addch(actor[0], actor[1], char)


def get_new_direction(window, timeout):
    """
    Get the direction input from the user.

    :param window: The curses window object.
    :param timeout: Timeout in milliseconds for waiting for input.
    :return: The direction input by the user, or None if no input.
    """
    window.timeout(timeout)
    direction = window.getch()
    if direction in [curses.KEY_UP, curses.KEY_LEFT, curses.KEY_DOWN, curses.KEY_RIGHT]:
        return direction
    return None


def move_snake(snake, direction, snake_ate_fruit):
    """
    Move the snake one step in the specified direction.

    :param snake: List of the snake's body coordinates.
    :param direction: The direction to move.
    :param snake_ate_fruit: Whether the snake has eaten a fruit.
    """
    head = snake[0].copy()  # Copy the current head position
    # Calculate the new head position
    move_actor(actor=head, direction=direction)
    snake.insert(0, head)  # Add the new head to the front of the snake
    if not snake_ate_fruit:
        snake.pop()  # Remove the last segment if the snake didn't eat a fruit


def move_actor(actor, direction):
    """
    Update the actor's position based on the direction.

    :param actor: The current position of the actor [y, x].
    :param direction: The direction to move.
    """
    match direction:
        case curses.KEY_UP:
            actor[0] -= 1  # Move up
        case curses.KEY_DOWN:
            actor[0] += 1  # Move down
        case curses.KEY_LEFT:
            actor[1] -= 1  # Move left
        case curses.KEY_RIGHT:
            actor[1] += 1  # Move right


def actor_hit_border(actor, window):
    """
    Check if the actor hits the border.

    :param actor: The actor's position [y, x].
    :param window: The curses window object.
    :return: True if the actor hits the border, False otherwise.
    """
    height, width = window.getmaxyx()
    return actor[0] <= 0 or actor[0] >= height - 1 or actor[1] <= 0 or actor[1] >= width - 1


def select_level():
    """
    Allow the user to select a difficulty level.

    :return: The speed of the game based on the selected level.
    """
    level = {
        '1': 1000,
        '2': 500,
        '3': 150,
        '4': 90,
        '5': 50,
    }
    while True:
        selection = input('Select the level from 1 to 5:')
        game_speed = level.get(selection)
        if game_speed is not None:
            return game_speed


if __name__ == '__main__':
    curses.wrapper(game_loop, game_speed=select_level())
