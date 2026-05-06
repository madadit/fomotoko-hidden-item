# 🎮 Hidden Item Game (CLI)

## 📌 Overview

This project is a simple **command-line (CLI) application** built using PHP to simulate a **Hidden Item Game**.

The goal of this program is to:

- Determine the possible location of a hidden item based on player movement
- Output the calculated coordinates
- (Bonus) Display the grid with the possible item location marked using `$`

---

## ⚙️ How It Works

### 🗺️ Grid Layout

The grid is represented as a 2D array:

- `#` → Obstacle (cannot be passed)
- `.` → Clear path
- `X` → Player's starting position

Example:

```id="c1gr17"
########
#......#
#.###..#
#...#.##
#X#....#
########
```

---

## 🧭 Movement Rules

From the starting position (`X`), the player moves in the following order:

1. **North (Up)** by A steps
2. **East (Right)** by B steps
3. **South (Down)** by C steps

---

## 📥 Input

The step values are defined directly in the code:

```php id="rjj0b1"
$stepsA = 3; // North
$stepsB = 4; // East
$stepsC = 1; // South
```

---

## 📤 Output

### 1. Probable Item Location

Example:

```id="z6df8s"
Probable Item Location found at:
- Row: 2, Column: 6 (Array Index: [1][5])
```

---

### 2. Validation

If the result:

- Goes outside the grid ❌
- Hits an obstacle (`#`) ❌

Then:

```id="5r8pc1"
Item not found or position is invalid (blocked or out of bounds).
```

---

### 3. (Bonus) Grid Visualization

The result location will be marked with `$`

Example:

```id="7fq0j5"
Grid Layout:
# # # # # # # #
# . . . . $ . #
# . # # # . . #
# . . . # . # #
# X # . . . . #
# # # # # # # #
```

---

## ▶️ How to Run

Make sure PHP is installed, then run:

```bash id="ps6m9l"
php filename.php
```

---

## 🧠 Core Logic

The target coordinate is calculated using:

```php id="20t3a0"
$targetY = startY - stepsA + stepsC;
$targetX = startX + stepsB;
```

Then:

- Validate if the coordinate exists in the grid
- Ensure it is a valid path (`.`)

---

## 📌 Notes

- This program calculates **one possible location** based on the given steps
- Validation ensures the position is valid
- Inputs are hardcoded for simplicity

---

## ✨ Features

- 2D grid representation
- Movement logic based on instructions
- Boundary and obstacle validation
- Coordinate output
- Bonus grid visualization

---

## 👨‍💻 Author

Ahmad Aditiya
