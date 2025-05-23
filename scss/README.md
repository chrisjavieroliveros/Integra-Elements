# WP Integra Elements SCSS Architecture

A streamlined SCSS architecture based on SMACSS principles with centralized configuration designed for WordPress themes.

## Table of Contents

1. [Overview](#overview)
2. [Directory Structure](#directory-structure)
3. [Configuration System](#configuration-system)
   - [Colors](#colors)
   - [Typography](#typography)
   - [Spacing](#spacing)
   - [Breakpoints](#breakpoints)
   - [Component Configurations](#component-configurations)
4. [Using the Architecture](#using-the-architecture)
   - [Basic Usage](#basic-usage)
   - [Working with Layouts](#working-with-layouts)
   - [Creating Components](#creating-components)
   - [Using Utility Classes](#using-utility-classes)
5. [Best Practices](#best-practices)
6. [Extending the System](#extending-the-system)

## Overview

This SCSS architecture implements SMACSS (Scalable and Modular Architecture for CSS) principles to create a maintainable and scalable styling system. Key features include:

- **Centralized Configuration**: All design tokens are defined in one place
- **Modular Structure**: Organized by functionality and purpose
- **Utility-First Approach**: Common patterns abstracted into utility classes
- **Component-Based**: Encourages reusable, self-contained components
- **Responsive Design**: Built-in breakpoint system for responsive layouts

## Directory Structure

```
/scss/
├── main.scss              # Main entry file
├── config/                # Centralized configuration
│   ├── __index.scss       # Forwards all config files
│   ├── _colors.scss       # Color configuration
│   ├── _typography.scss   # Typography configuration
│   ├── _spacing.scss      # Spacing configuration
│   ├── _breakpoints.scss  # Responsive breakpoints
│   ├── _buttons.scss      # Button component configuration
│   └── _functions.scss    # Global utility functions
├── base/                  # Base styles
│   ├── __index.scss       # Initializes CSS variables & forwards files
│   ├── _reset.scss        # Reset/normalize
│   ├── _typography.scss   # Typography styles
│   └── _buttons.scss      # Base button styles
├── layouts/               # Layout styles
│   ├── __index.scss       # Forwards all layout files
│   ├── _container.scss    # Container styles
│   └── _grid.scss         # Simple grid system
├── components/            # Reusable UI components
│   ├── __index.scss       # Forwards all component files
│   ├── _card.scss         # Card component
│   └── _hero.scss         # Hero component
├── utilities/             # Utility classes
│   ├── __index.scss       # Forwards all utility files
│   ├── _helpers.scss      # Helper classes
│   ├── _display.scss      # Display utility classes
│   ├── _text-align.scss   # Text alignment utilities
│   ├── _margins.scss      # Margin utility classes
│   └── _paddings.scss     # Padding utility classes
└── pages/                 # Page-specific styles
    └── __index.scss       # Forwards all page files
```

## Configuration System

### Colors

The color system provides a consistent palette throughout the application:

```scss
// Using color functions
.my-element {
  color: color("primary");
  background-color: color("light-100");
  border: 1px solid color("primary-300");
}

// Using CSS variables
.my-element {
  color: var(--color-primary);
  background-color: var(--color-light-100);
}

// With opacity
.overlay {
  background-color: color-alpha("dark-800", 0.7);
}
```

### Typography

Typography settings manage font families, weights, sizes, and more:

```scss
// Using typography functions
.title {
  font-family: font-family("heading");
  font-size: font-size("2xl");
  font-weight: font-weight("bold");
  line-height: line-height("tight");
}

// Using CSS variables
.subtitle {
  font-size: var(--font-size-lg);
  font-weight: var(--font-weight-medium);
}
```

### Spacing

The spacing system ensures consistent margins, paddings, and dimensions:

```scss
// Using spacing functions
.container {
  padding: spacing("4");
  margin-bottom: spacing("6");
}

// Using CSS variables
.panel {
  gap: var(--spacing-2);
  padding: var(--spacing-4);
}
```

### Breakpoints

The responsive system helps build adaptive layouts:

```scss
// Using breakpoint mixin
.card {
  width: 100%;

  @include breakpoint("md") {
    width: 50%;
  }

  @include breakpoint("lg") {
    width: 33.333%;
  }
}

// Using breakpoint function
@media (min-width: breakpoint("xl")) {
  .container {
    max-width: 1140px;
  }
}

// Using CSS variables
@media (min-width: var(--breakpoint-lg)) {
  .sidebar {
    display: block;
  }
}
```

### Component Configurations

Component-specific settings are centralized in the config directory:

```scss
// _buttons.scss in config directory defines variables
$button-padding-y: spacing("2");
$button-border-radius: 4px;

// Using those configurations in components
.button {
  padding: $button-padding-y $button-padding-x;
  border-radius: $button-border-radius;
}
```

## Using the Architecture

### Basic Usage

1. **Import the main file** in your main stylesheet or entry point:

```scss
@use "path/to/scss/main";
```

2. **Add new modules** by creating files in the appropriate directory and updating the corresponding `__index.scss` file.

3. **Generate CSS variables** - this is already handled in `base/__index.scss` through:

```scss
@include config.generate-color-variables();
@include config.generate-typography-variables();
@include config.generate-spacing-variables();
@include config.generate-breakpoint-variables();
@include config.generate-button-variables();
```

### Working with Layouts

The layout system provides structural patterns:

```scss
<!-- HTML Example -->
<div class="container">
  <div class="grid grid--3-col">
    <div class="card">Content 1</div>
    <div class="card">Content 2</div>
    <div class="card">Content 3</div>
  </div>
</div>
```

Layout modifiers:

- Grid spacings: `.grid--gap-sm`, `.grid--gap-lg`
- Grid columns: `.grid--2-col`, `.grid--3-col`, `.grid--4-col`, `.grid--auto-fit`

### Creating Components

1. Create a new file in the `components/` directory:

```scss
// _alert.scss
@use "../config/_index" as config;

.alert {
  padding: config.spacing("4");
  border-radius: 4px;
  margin-bottom: config.spacing("4");

  &--success {
    background-color: config.color("success-100");
    border: 1px solid config.color("success");
  }

  &--danger {
    background-color: config.color("danger-100");
    border: 1px solid config.color("danger");
  }
}
```

2. Add your component to the `components/__index.scss` file:

```scss
@forward "alert";
```

### Using Utility Classes

The architecture provides utility classes for common styling needs:

```html
<!-- Margin utilities -->
<div class="mt-4 mb-6">...</div>

<!-- Padding utilities -->
<div class="p-4 pt-6">...</div>

<!-- Display utilities -->
<div class="d-flex flex-column">...</div>

<!-- Flex utilities -->
<div class="flex-row justify-center align-center">...</div>

<!-- Text alignment -->
<div class="text-center">...</div>
```

Available utility classes include:

- **Margins**: `.m-{size}`, `.mt-{size}`, `.mb-{size}`
- **Paddings**: `.p-{size}`, `.pt-{size}`, `.pb-{size}`
- **Display**: `.d-flex`, `.d-block`, `.d-none`
- **Flex utilities**: `.flex-row`, `.flex-column`, `.justify-center`, `.align-center`
- **Text alignment**: `.text-center`, `.text-left`, `.text-right`

## Best Practices

1. **Follow the modular structure**

   - Place styles in the appropriate directory based on their purpose
   - Keep components self-contained and reusable

2. **Use the configuration system**

   - Always use configuration variables instead of hard-coded values
   - Access values through functions rather than direct variable references

3. **Be consistent with naming**

   - Use BEM (Block Element Modifier) methodology for component classes
   - Use consistent naming patterns for utility classes

4. **Keep specificity low**

   - Avoid deep nesting of selectors
   - Prefer composing utility classes over writing custom CSS

5. **Document your code**
   - Add comments to explain complex logic or unusual patterns
   - Update this README when adding new features to the architecture

## Extending the System

### Adding New Configuration

1. Create a new file in the `config/` directory
2. Add your configuration variables and functions
3. Add the file to `config/__index.scss`
4. If needed, create a generator mixin for CSS variables

### Adding New Utilities

1. Create a new file in the `utilities/` directory
2. Add your utility classes
3. Add the file to `utilities/__index.scss`

### Creating New Components

1. Create a new file in the `components/` directory
2. Use configuration values for consistent design
3. Add the file to `components/__index.scss`
