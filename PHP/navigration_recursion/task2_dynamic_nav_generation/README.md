# Task 1 – PHP MVC Website with Dynamic Navigation

## 📘 Overview

This task demonstrates how to structure a simple PHP website using the **Model-View-Controller (MVC)** design pattern. The website displays London landmarks with reusable content blocks, a single entry point, and dynamically generated views based on user navigation.

---

## 🎯 Task Objectives

- Apply the MVC pattern in PHP
- Use a **single controller file (`index.php`)** to manage user requests
- Create **reusable content models** for each landmark page (e.g., `eye.php`, `abbey.php`)
- Load content dynamically based on `?view=...` URL parameters
- Use a **shared HTML template** (`pageTemplate.html`) with placeholder replacement
- Implement **navigation** using a PHP-generated array
- Reuse functions for headings, paragraphs, and structure

---
## ⚙️ Features

- 🔁 Reusable template system with placeholders like `[+content+]`, `[+title+]`, `[+footer+]`
- 📚 Content models define text and images for each landmark using PHP
- 🧭 Navigation is generated from an array of links and inserted dynamically
- ❗ Built-in 404 message for invalid or missing pages
- 🧪 Integrated “See Code / Hide Code” toggle for HTML source inspection

---

## ✅ Result

The website dynamically renders the correct page based on the user's selection in the nav bar, all while keeping content, logic, and layout **cleanly separated**. It is a foundational example of applying structured, maintainable PHP web development.



