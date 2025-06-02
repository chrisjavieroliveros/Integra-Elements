# SCSS Architecture

A clean, theme-swappable SCSS architecture based on SMACSS methodology.

## Structure Overview

```
scss/
├── config/                 # Configuration (variables & functions)
│   ├── config.scss        # → Compiles to config.css
│   ├── _colors.scss       # Color maps & functions
│   ├── _typography.scss   # Typography maps & functions
│   ├── _spacing.scss      # Spacing maps & functions
│   └── _buttons.scss      # Button configurations
├── base/                  # Base styles, resets, typography
├── layouts/               # Layout components (grids, containers)
├── components/            # UI components (buttons, cards)
├── utilities/             # Mixins, functions & utility classes
├── pages/                 # Page-specific styles
└── main.scss             # → Compiles to main.css
```

## Key Principles

### **1. Clean Separation**
- **`config.scss`** → **`config.css`** = CSS custom properties only
- **`main.scss`** → **`main.css`** = Styles that use CSS custom properties
- **Individual config files** = Maps and utility functions only

### **2. Flat Structure**
- No confusing nested directories
- Each directory has a clear, single purpose
- Easy to find and organize files

### **3. Two-File System**
```html
<!-- Link both CSS files in your HTML -->
<link rel="stylesheet" href="config.css">  <!-- Variables first -->
<link rel="stylesheet" href="main.css">    <!-- Styles second -->
```

### **4. Theme Swapping**
To change themes, simply:
1. Create alternate config files (e.g., `config-dark.scss`)
2. Compile to alternate CSS (e.g., `config-dark.css`)
3. Swap the CSS link: `config.css` → `config-dark.css`
4. **No need to recompile `main.css`!**

## Directory Purpose

| Directory | Purpose | Examples |
|-----------|---------|----------|
| `config/` | Variables, maps, functions | Colors, typography, spacing |
| `base/` | Global defaults | Reset, typography, body styles |
| `layouts/` | Structure & positioning | Grid systems, containers, header/footer |
| `components/` | Reusable UI elements | Buttons, cards, modals, forms |
| `utilities/` | Helpers & tools | Mixins, utility classes, spacing helpers |
| `pages/` | Page-specific styles | Homepage, about page, contact page |

## Usage Examples

### In SCSS (during development):
```scss
// Use functions for calculations
.button {
  background-color: getColor('Primary');
  padding: spacing('sm');
  font-size: font-size('lg');
}
```

### In CSS (after compilation):
```css
/* config.css provides variables */
:root {
  --color-Primary: #C33329;
  --spacing-4: 1rem;
  --font-size-lg: 1.125rem;
}

/* main.css uses variables */
.button {
  background-color: var(--color-Primary);
  padding: var(--spacing-4);
  font-size: var(--font-size-lg);
}
```

## Benefits

✅ **Simple theme swapping** - Change one CSS file  
✅ **No duplication** - CSS custom properties generated once  
✅ **Clean separation** - Config vs styles  
✅ **Flat structure** - No confusing nested directories  
✅ **Clear purpose** - Each directory has a single responsibility  
✅ **Maintainable** - Easy to find and organize files  
✅ **Scalable** - Easy to add new themes or configurations 