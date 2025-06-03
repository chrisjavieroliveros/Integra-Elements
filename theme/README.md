# SMACSS SCSS Framework

A scalable, modular SCSS architecture based on SMACSS methodology with clean theme-swapping capabilities.

**Version:** 2.0.0  
**Author:** Chris Javier Oliveros  
**License:** MIT

## 🚀 Quick Start

### 1. Compile Both Entry Points
```bash
# Compile configuration (CSS custom properties)
sass config/config.scss:css/config.css

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
  padding: var(--spacing-md);
  font-size: var(--font-size-lg);
}
```

## 📁 Architecture Overview

```
theme/
├── config/                    # Configuration & CSS custom properties
│   ├── config.scss           # Main config entry point → config.css
│   ├── _colors.scss          # Color definitions & color map
│   ├── _typography.scss      # Typography definitions & maps
│   ├── _spacing.scss         # Spacing definitions & spacing map
│   ├── _buttons.scss         # Button configurations & button map
│   └── _breakpoints.scss     # Breakpoint definitions
├── scss/                     # SCSS source files
│   ├── main.scss             # Main entry point → main.css
│   ├── utilities/            # SCSS functions & utilities
│   │   ├── __index.scss      # Functions entry point
│   │   ├── _get-color.scss   # Color helper function
│   │   └── _breakpoints.scss # Breakpoint helper functions
│   ├── helpers/              # Utility classes & helper styles
│   │   ├── __index.scss      # Helpers entry point
│   │   ├── _text.scss        # Text utility classes
│   │   ├── _text-align.scss  # Text alignment utilities
│   │   ├── _display.scss     # Display utility classes
│   │   ├── _margins.scss     # Margin utility classes
│   │   └── _paddings.scss    # Padding utility classes
│   ├── base/                 # Base styles & resets
│   │   ├── __index.scss      # Base styles entry point
│   │   ├── _reset.scss       # Modern CSS reset
│   │   ├── _typography.scss  # Base typography styles
│   │   └── _buttons.scss     # Base button styles
│   ├── layouts/              # Layout components
│   │   ├── __index.scss      # Layout entry point
│   │   ├── _container.scss   # Container system
│   │   └── _grid.scss        # Grid system
│   ├── components/           # Reusable UI components
│   │   └── __index.scss      # Components entry point
│   └── pages/                # Page-specific styles
│       └── __index.scss      # Pages entry point
└── README.md                 # This documentation file
```

## 🎯 Core Principles

### **Two-File Architecture**
The framework uses a clean separation approach:

- **`config/config.scss` → `config.css`** = CSS custom properties only
- **`scss/main.scss` → `main.css`** = Styles that consume CSS custom properties

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
- Clean directory separation (config vs scss)
- SCSS functions for consistent property access
- Helper utilities for common patterns
- Uses `__index.scss` files for clean imports

## 🛠️ Directory Guide

| Directory | Purpose | What Goes Here |
|-----------|---------|----------------|
| **`config/`** | Variables & CSS custom properties | Color palettes, typography scales, spacing systems, button configs |
| **`scss/utilities/`** | SCSS functions & utilities | Helper functions like `getColor()`, breakpoint functions |
| **`scss/helpers/`** | Utility classes & helper styles | Text utilities, spacing helpers, display classes |
| **`scss/base/`** | Global defaults & resets | CSS resets, base typography, global element styles |
| **`scss/layouts/`** | Structure & positioning | Grid systems, containers, layout components |
| **`scss/components/`** | Reusable UI elements | Buttons, cards, modals, forms, navigation |
| **`scss/pages/`** | Page-specific styles | Homepage styles, about page, contact page |

## 📝 Usage Examples

### Configuration Functions (SCSS)
```scss
// In your SCSS files, use these functions:
.card {
  background-color: getColor('White');
  border: 1px solid getColor('Light-300');
  padding: var(--spacing-lg);
  border-radius: var(--spacing-xs);
  
  h2 {
    color: getColor('Dark-800');
    font-size: var(--font-size-xl);
    font-weight: var(--font-weight-bold);
    margin-bottom: var(--spacing-md);
  }
}
```

### Generated CSS Output
```css
/* config.css - Generated CSS custom properties */
:root {
  --color-Primary: #C33329;
  --color-White: #ffffff;
  --color-Light-300: #e6e9ed;
  --color-Dark-800: #24272e;
  --spacing-xs: 0.25rem;
  --spacing-md: 1rem;
  --spacing-lg: 1.5rem;
  --font-size-xl: 1.25rem;
  --font-weight-bold: 600;
}

/* main.css - Styles using the custom properties */
.card {
  background-color: var(--color-White);
  border: 1px solid var(--color-Light-300);
  padding: var(--spacing-lg);
  border-radius: var(--spacing-xs);
}

.card h2 {
  color: var(--color-Dark-800);
  font-size: var(--font-size-xl);
  font-weight: var(--font-weight-bold);
  margin-bottom: var(--spacing-md);
}
```

## 🎨 Available Configuration

### Colors
```scss
// Available color functions
getColor('Primary')        // #C33329 - Brand primary color
getColor('Secondary')      // #222d3f - Brand secondary color
getColor('Tertiary')       // #F5A623 - Brand tertiary color
getColor('White')          // #ffffff - White color
getColor('Black')          // #272727 - Black color

// Color variants
getColor('Primary-400')    // Primary color variants (50-950)
getColor('Light-300')      // Light neutral colors (100-900)
getColor('Dark-800')       // Dark neutral colors (100-900)

// State colors
getColor('Danger')         // #B91C1C - Error/danger states
getColor('Warning')        // #EA580C - Warning states
getColor('Success')        // #047857 - Success states
getColor('Info')           // #0369A1 - Info states
```

### Typography
```scss
// Typography CSS custom properties
var(--font-family-primary)    // Font families
var(--font-size-xs)           // Font sizes (xs, sm, md, lg, xl, etc.)
var(--font-weight-normal)     // Font weights (light, normal, medium, bold, etc.)
var(--line-height-normal)     // Line heights
var(--letter-spacing-normal)  // Letter spacing values
```

### Spacing
```scss
// Spacing CSS custom properties
var(--spacing-xs)         // 0.25rem
var(--spacing-sm)         // 0.5rem
var(--spacing-md)         // 1rem
var(--spacing-lg)         // 1.5rem
var(--spacing-xl)         // 2rem
// ... and more defined in _spacing.scss
```

### Buttons
```scss
// Button configuration CSS custom properties
var(--button-sm)          // Small button dimensions
var(--button-md)          // Medium button dimensions  
var(--button-lg)          // Large button dimensions
```

## 🔧 Development Workflow

### Adding New Components
1. Create your component file in `scss/components/`
2. Import it in `scss/components/__index.scss`
3. Use `getColor()` function and CSS custom properties for consistency

### Creating New Themes
1. Copy `config/config.scss` to `config/config-[theme].scss`
2. Create theme-specific configuration files (e.g., `_colors-dark.scss`)
3. Modify the imports in your theme config file
4. Compile to `config-[theme].css`
5. Swap the CSS link in your HTML

### Adding Utility Classes
1. Add utilities to appropriate files in `scss/helpers/`
2. Import them in `scss/helpers/__index.scss`
3. They'll be automatically included in the compiled CSS

### Using SCSS Functions
```scss
// Import functions in your SCSS files
@use "../functions" as functions;

.my-component {
  color: functions.getColor('Primary');
  
  @include functions.breakpoint('md') {
    font-size: var(--font-size-lg);
  }
}
```

## 🌟 Benefits

✅ **Theme Swapping** - Change themes by swapping one CSS file  
✅ **No Duplication** - CSS custom properties defined once  
✅ **Clean Separation** - Configuration separate from styles  
✅ **SCSS Functions** - Consistent property access with validation  
✅ **Helper Utilities** - Pre-built utility classes for common patterns  
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
@use "buttons" as buttons;

// Generate custom properties with dark theme colors
:root {
  @each $name, $value in colors.$colors {
    --color-#{$name}: #{$value};
  }
  // ... rest of the custom properties
}
```

### Responsive Design with Functions
```scss
// Use breakpoint functions from scss/utilities/
@use "../functions" as functions;

.my-component {
  padding: var(--spacing-sm);
  
  @include functions.breakpoint('md') {
    padding: var(--spacing-lg);
  }
  
  @include functions.breakpoint('lg') {
    padding: var(--spacing-xl);
  }
}
```

### Component Development Best Practices
```scss
// scss/components/_card.scss
@use "../functions" as functions;

.card {
  background: functions.getColor('White');
  border-radius: var(--spacing-sm);
  padding: var(--spacing-md);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  
  &__header {
    border-bottom: 1px solid functions.getColor('Light-300');
    padding-bottom: var(--spacing-sm);
    margin-bottom: var(--spacing-md);
  }
  
  &__title {
    font-size: var(--font-size-lg);
    font-weight: var(--font-weight-semibold);
    color: functions.getColor('Dark-800');
  }
  
  // Responsive adjustments
  @include functions.breakpoint('md') {
    padding: var(--spacing-lg);
  }
}
```

### Available Helper Utilities
```scss
// Text utilities (from scss/helpers/_text.scss)
.text-primary { color: var(--color-Primary); }
.text-secondary { color: var(--color-Secondary); }

// Text alignment utilities (from scss/helpers/_text-align.scss)
.text-left { text-align: left; }
.text-center { text-align: center; }
.text-right { text-align: right; }

// Display utilities (extend scss/helpers/_display.scss)
.d-block { display: block; }
.d-flex { display: flex; }
.d-grid { display: grid; }
```

## 📚 File Structure Examples

### Entry Points
- **`config/config.scss`** - Generates all CSS custom properties
- **`scss/main.scss`** - Main stylesheet entry point

### Configuration Files
- **`config/_colors.scss`** - Color palette maps
- **`config/_typography.scss`** - Typography configuration maps
- **`config/_spacing.scss`** - Spacing system maps
- **`config/_buttons.scss`** - Button configuration maps

### Function Files
- **`scss/utilities/_get-color.scss`** - Color getter function with validation
- **`scss/utilities/_breakpoints.scss`** - Responsive breakpoint mixins

### Component Organization
- Each component gets its own file in `scss/components/`
- Import new components in `scss/components/__index.scss`
- Use consistent naming: `_component-name.scss`

---

**Need help?** Check the individual files in each directory for more specific documentation and examples. Each configuration file contains detailed maps and the functions directory provides helper utilities for consistent development.