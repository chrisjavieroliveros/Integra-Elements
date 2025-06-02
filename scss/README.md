# SMACSS SCSS Framework

A scalable, modular SCSS architecture based on SMACSS methodology with clean theme-swapping capabilities.

**Version:** 2.0.0  
**Author:** Chris Javier Oliveros  
**License:** MIT

## 🚀 Quick Start

### 1. Compile Both Entry Points
```bash
# Compile configuration (CSS custom properties)
sass scss/config/config.scss:css/config.css

# Compile main styles (uses CSS custom properties)
sass scss/main.scss:css/main.css
```

### 2. Link Both CSS Files
```html
<!-- Link in this order -->
<link rel="stylesheet" href="css/config.css">  <!-- Variables first -->
<link rel="stylesheet" href="css/main.css">    <!-- Styles second -->
```

### 3. Start Building
```scss
// Use configuration functions in your SCSS
.my-component {
  background-color: getColor('Primary');
  padding: spacing('md');
  font-size: font-size('lg');
}
```

## 📁 Architecture Overview

```
scss/
├── config/                 # Configuration & CSS custom properties
│   ├── config.scss        # Main config entry point → config.css
│   ├── _colors.scss       # Color definitions & functions
│   ├── _typography.scss   # Typography definitions & functions
│   ├── _spacing.scss      # Spacing definitions & functions
│   └── _buttons.scss      # Button configurations
├── base/                  # Base styles & resets
│   ├── __index.scss       # Base styles entry point
│   ├── _reset.scss        # Modern CSS reset
│   ├── _typography.scss   # Base typography styles
│   └── _buttons.scss      # Base button styles
├── layouts/               # Layout components
│   ├── __index.scss       # Layout entry point
│   ├── _container.scss    # Container system
│   └── _grid.scss         # Grid system
├── components/            # Reusable UI components
│   └── __index.scss       # Components entry point
├── utilities/             # Utility classes & helpers
│   ├── __index.scss       # Utilities entry point
│   ├── _breakpoints.scss  # Media query helpers
│   ├── _text.scss         # Text utilities
│   └── _text-align.scss   # Text alignment utilities
├── pages/                 # Page-specific styles
│   └── __index.scss       # Pages entry point
└── main.scss             # Main entry point → main.css
```

## 🎯 Core Principles

### **Two-File Architecture**
The framework uses a clean separation approach:

- **`config.scss` → `config.css`** = CSS custom properties only
- **`main.scss` → `main.css`** = Styles that consume CSS custom properties

### **Theme Swapping Made Simple**
```html
<!-- Default theme -->
<link rel="stylesheet" href="css/config.css">
<link rel="stylesheet" href="css/main.css">

<!-- Dark theme (example) -->
<link rel="stylesheet" href="css/config-dark.css">  <!-- Just swap this! -->
<link rel="stylesheet" href="css/main.css">         <!-- No recompile needed -->
```

### **Modular & Scalable**
- Flat directory structure (no confusing nesting)
- Single responsibility per directory
- Easy to find and organize files
- Uses `__index.scss` files for clean imports

## 🛠️ Directory Guide

| Directory | Purpose | What Goes Here |
|-----------|---------|----------------|
| **`config/`** | Variables & CSS custom properties | Color palettes, typography scales, spacing systems |
| **`base/`** | Global defaults & resets | CSS resets, base typography, global element styles |
| **`layouts/`** | Structure & positioning | Grid systems, containers, header/footer layouts |
| **`components/`** | Reusable UI elements | Buttons, cards, modals, forms, navigation |
| **`utilities/`** | Helper classes & tools | Utility classes, mixins, responsive helpers |
| **`pages/`** | Page-specific styles | Homepage styles, about page, contact page |

## 📝 Usage Examples

### Configuration Functions (SCSS)
```scss
// In your SCSS files, use these functions:
.card {
  background-color: getColor('Background');
  border: 1px solid getColor('Border');
  padding: spacing('lg');
  border-radius: spacing('xs');
  
  h2 {
    color: getColor('Text-Primary');
    font-size: font-size('xl');
    font-weight: font-weight('bold');
    margin-bottom: spacing('md');
  }
}
```

### Generated CSS Output
```css
/* config.css - Generated CSS custom properties */
:root {
  --color-Primary: #C33329;
  --color-Background: #ffffff;
  --color-Border: #e5e7eb;
  --color-Text-Primary: #1f2937;
  --spacing-xs: 0.25rem;
  --spacing-md: 1rem;
  --spacing-lg: 1.5rem;
  --font-size-xl: 1.25rem;
  --font-weight-bold: 600;
}

/* main.css - Styles using the custom properties */
.card {
  background-color: var(--color-Background);
  border: 1px solid var(--color-Border);
  padding: var(--spacing-lg);
  border-radius: var(--spacing-xs);
}

.card h2 {
  color: var(--color-Text-Primary);
  font-size: var(--font-size-xl);
  font-weight: var(--font-weight-bold);
  margin-bottom: var(--spacing-md);
}
```

## 🎨 Available Configuration

### Colors
```scss
// Available color functions
getColor('Primary')        // Brand primary color
getColor('Secondary')      // Brand secondary color
getColor('Background')     // Background colors
getColor('Text-Primary')   // Text colors
getColor('Border')         // Border colors
// ... and more defined in _colors.scss
```

### Typography
```scss
// Typography functions
font-size('xs')           // Font sizes
font-weight('bold')       // Font weights
line-height('normal')     // Line heights
letter-spacing('wide')    // Letter spacing
// ... and more defined in _typography.scss
```

### Spacing
```scss
// Spacing functions
spacing('xs')             // 0.25rem
spacing('sm')             // 0.5rem
spacing('md')             // 1rem
spacing('lg')             // 1.5rem
spacing('xl')             // 2rem
// ... and more defined in _spacing.scss
```

## 🔧 Development Workflow

### Adding New Components
1. Create your component file in `components/`
2. Import it in `components/__index.scss`
3. Use configuration functions for consistency

### Creating New Themes
1. Copy `config/config.scss` to `config/config-[theme].scss`
2. Modify the imported configuration files or create theme-specific ones
3. Compile to `config-[theme].css`
4. Swap the CSS link in your HTML

### Adding Utility Classes
1. Add utilities to appropriate files in `utilities/`
2. Import them in `utilities/__index.scss`
3. They'll be automatically included in the compiled CSS

## 🌟 Benefits

✅ **Theme Swapping** - Change themes by swapping one CSS file  
✅ **No Duplication** - CSS custom properties defined once  
✅ **Clean Separation** - Configuration separate from styles  
✅ **Maintainable** - Easy to find and organize files  
✅ **Scalable** - Simple to add new components and themes  
✅ **Modern** - Uses CSS custom properties for maximum flexibility  
✅ **Performance** - No runtime CSS-in-JS overhead  

## 🚀 Advanced Usage

### Creating Custom Themes
```scss
// config/config-dark.scss
@use "colors-dark" as colors;  // Use dark color palette
@use "typography" as typography;
@use "spacing" as spacing;

// Same structure, different color values
```

### Responsive Design
```scss
// Use breakpoint mixins from utilities
.my-component {
  padding: spacing('sm');
  
  @include breakpoint('md') {
    padding: spacing('lg');
  }
}
```

### Component Development
```scss
// components/_card.scss
.card {
  background: getColor('Background');
  border-radius: spacing('sm');
  padding: spacing('md');
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  
  &__header {
    border-bottom: 1px solid getColor('Border');
    padding-bottom: spacing('sm');
    margin-bottom: spacing('md');
  }
  
  &__title {
    font-size: font-size('lg');
    font-weight: font-weight('semibold');
    color: getColor('Text-Primary');
  }
}
```

---

**Need help?** Check the individual files in each directory for more specific documentation and examples.