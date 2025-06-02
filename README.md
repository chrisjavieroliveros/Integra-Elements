# Integra Elements

A modern, performance-optimized WordPress theme built for Elementor with a sophisticated SCSS architecture. Modular, scalable, and developer-friendly.

**Version:** 2.0.0  
**Author:** Chris Javier Oliveros  
**License:** MIT

## Table of Contents

1. [Overview](#overview)
2. [Features](#features)
3. [Installation](#installation)
4. [Elementor Widgets](#elementor-widgets)
5. [SCSS Architecture](#scss-architecture)
6. [Theme Customization](#theme-customization)
7. [Development](#development)
8. [Browser Support](#browser-support)
9. [Contributing](#contributing)
10. [License](#license)

## Overview

Integra Elements is a WordPress theme designed specifically for Elementor page builder, providing custom widgets and a robust styling framework. The theme is built with performance, accessibility, and extensibility in mind, featuring a revolutionary two-file SCSS architecture that enables effortless theme swapping and superior maintainability.

## Features

- **🎨 Advanced SCSS Architecture**: Revolutionary two-file system with theme-swapping capabilities
- **⚡ Optimized for Elementor**: Custom widgets and seamless integration
- **🚀 Performance-Focused**: Minimized assets, optimized loading, and clean code
- **📱 Mobile-First Responsive Design**: Looks great on any device
- **👨‍💻 Developer-Friendly**: Well-documented code with consistent naming conventions
- **♿ Accessibility Ready**: WCAG 2.1 compliant markup and design
- **🔍 SEO Optimized**: Following best practices for search engine visibility
- **🎭 Theme Swapping**: Change entire color schemes without recompiling
- **🏗️ Modular Components**: Reusable, well-structured component system

## Installation

### 1. Download the theme
- Download the theme ZIP file from the repository
- Or clone directly: `git clone [repository-url]`

### 2. Install via WordPress Admin
- Go to **Appearance > Themes > Add New > Upload Theme**
- Choose the downloaded ZIP file and click "Install Now"
- Activate the theme

### 3. Required Plugins
- **Elementor Page Builder** (Free or Pro)
- **Elementor Pro** (recommended for advanced widgets)

### 4. Recommended Plugins
- **Yoast SEO** or **RankMath** for SEO optimization
- **WP Rocket** or similar caching plugin
- **Smush** or **ShortPixel** for image optimization

## Elementor Widgets

Integra Elements includes several custom Elementor widgets designed for maximum flexibility and performance:

### Available Widgets
- **🃏 Advanced Cards**: Flexible content cards with multiple layout options and hover effects
- **👥 Team Members**: Professional team profiles with social media integration
- **💬 Testimonial Slider**: Dynamic customer testimonials with rating systems
- **⭐ Feature Grid**: Highlight product/service features with icons and animations
- **📢 Call to Action**: Conversion-focused CTA sections with A/B testing support
- **📊 Statistics Counter**: Animated counters for showcasing achievements
- **🖼️ Image Gallery**: Advanced gallery with lightbox and filtering
- **📝 Content Blocks**: Flexible content sections with various layouts

### Using Elementor Widgets

1. **Edit a page with Elementor**
2. **Find widgets**: Look for the "Integra Elements" section in the Elementor panel
3. **Drag and drop**: Add widgets to your page layout
4. **Customize**: Use the comprehensive settings panel for each widget
5. **Preview**: Check responsiveness across different devices

## SCSS Architecture

The theme features a sophisticated SCSS architecture based on SMACSS principles with a revolutionary **two-file compilation system** that enables theme swapping without recompilation.

### 🏗️ Architecture Overview

```
/scss/
├── main.scss              # Main styles entry point → main.css
├── config/                # Configuration & CSS custom properties
│   ├── config.scss        # Main config entry point → config.css
│   ├── _colors.scss       # Color definitions & functions
│   ├── _typography.scss   # Typography scales & functions
│   ├── _spacing.scss      # Spacing system & functions
│   └── _buttons.scss      # Button configurations
├── base/                  # Base styles & resets
│   ├── __index.scss       # Base styles entry point
│   ├── _reset.scss        # Modern CSS reset
│   ├── _typography.scss   # Base typography styles
│   └── _buttons.scss      # Base button styles
├── layouts/               # Layout components
│   ├── __index.scss       # Layout entry point
│   ├── _container.scss    # Container system
│   └── _grid.scss         # Flexible grid system
├── components/            # Reusable UI components
│   └── __index.scss       # Components entry point
├── utilities/             # Utility classes & helpers
│   ├── __index.scss       # Utilities entry point
│   ├── _breakpoints.scss  # Responsive breakpoint mixins
│   ├── _text.scss         # Text utility classes
│   └── _text-align.scss   # Text alignment utilities
└── pages/                 # Page-specific styles
    └── __index.scss       # Pages entry point
```

### 🎯 Key Features of the SCSS System

- **🎭 Theme Swapping**: Change themes by swapping one CSS file
- **🏗️ Two-File Architecture**: `config.css` (variables) + `main.css` (styles)
- **🎨 Design Token System**: Centralized design variables via CSS custom properties
- **🧩 Component-Based**: Self-contained, reusable components
- **📱 Responsive Framework**: Built-in breakpoint system with mixins
- **⚡ Performance Optimized**: No runtime CSS-in-JS overhead
- **🔧 Developer-Friendly**: Easy to extend and maintain

### 📖 Detailed Documentation

For comprehensive documentation on using the SCSS architecture, see the [SCSS README](scss/README.md).

## Theme Customization

### 🎨 Quick Theme Swapping

The theme's revolutionary architecture allows you to swap entire themes by changing one CSS file:

```html
<!-- Default theme -->
<link rel="stylesheet" href="css/config.css">
<link rel="stylesheet" href="css/main.css">

<!-- Dark theme -->
<link rel="stylesheet" href="css/config-dark.css">  <!-- Just swap this! -->
<link rel="stylesheet" href="css/main.css">         <!-- No recompile needed -->
```

### 🛠️ Using the WordPress Customizer

1. Go to **Appearance > Customize**
2. Adjust available settings for:
   - **Site Identity**: Logo, tagline, site icon
   - **Colors**: Brand colors, backgrounds, text colors
   - **Typography**: Font families, sizes, weights
   - **Layout Options**: Container widths, spacing
   - **Header & Footer**: Layout and styling options
   - **Elementor Integration**: Widget-specific settings

### 👨‍💻 Advanced Customization for Developers

1. **Create a child theme** for major customizations
2. **Use available hooks and filters** for functionality extension
3. **Extend the SCSS architecture** by adding new configuration files
4. **Create custom Elementor widgets** using the theme's component system
5. **Leverage the design token system** for consistent styling

## Development

### 📋 Prerequisites

- **Node.js** (v16+ recommended)
- **npm** or **yarn**
- **Sass/SCSS compiler** (Dart Sass recommended)
- **Local WordPress development environment** (Local, XAMPP, or similar)
- **Elementor** installed and activated

### 🚀 Setup Development Environment

1. **Clone the repository**
```bash
git clone [repository-url]
cd WP-Integra-Elements
```

2. **Install dependencies** (if using build tools)
```bash
npm install
# or
yarn install
```

3. **Compile SCSS files**
```bash
# Compile configuration (CSS custom properties)
sass scss/config/config.scss:css/config.css

# Compile main styles
sass scss/main.scss:css/main.css

# Or watch for changes
sass --watch scss/config/config.scss:css/config.css &
sass --watch scss/main.scss:css/main.css
```

### 🏗️ Development Workflow

1. **Make changes** to SCSS files in the appropriate directories
2. **Use configuration functions** for consistent values:
   ```scss
   .my-component {
     background-color: getColor('Primary');
     padding: spacing('md');
     font-size: font-size('lg');
   }
   ```
3. **Compile and test** your changes
4. **Create new themes** by duplicating and modifying config files

### 📦 Build for Production

```bash
# Production build with optimization
sass scss/config/config.scss:css/config.css --style=compressed
sass scss/main.scss:css/main.css --style=compressed

# Or if using npm scripts
npm run build
```

### 🧪 Testing

1. **Cross-browser testing** on all supported browsers
2. **Responsive testing** across different screen sizes
3. **Accessibility testing** with screen readers and keyboard navigation
4. **Performance testing** with PageSpeed Insights and GTmetrix
5. **Elementor compatibility** testing with various widgets and layouts

## Browser Support

- ✅ **Chrome** (latest 2 versions)
- ✅ **Firefox** (latest 2 versions)
- ✅ **Safari** (latest 2 versions)
- ✅ **Edge** (latest 2 versions)
- ✅ **Opera** (latest 2 versions)
- ✅ **iOS Safari** (latest 2 versions)
- ✅ **Android Chrome** (latest 2 versions)

### CSS Features Used
- CSS Custom Properties (IE 11+ with fallbacks)
- CSS Grid (IE 11+ with fallbacks)
- Flexbox (IE 10+)
- CSS Transforms and Transitions

## Contributing

Contributions are welcome and appreciated! We follow a structured approach to maintain code quality.

### 🤝 How to Contribute

1. **Fork the repository**
2. **Create your feature branch**
   ```bash
   git checkout -b feature/amazing-feature
   ```
3. **Follow coding standards**:
   - Use the existing SCSS architecture
   - Follow BEM naming conventions
   - Write clear, commented code
   - Test across multiple browsers
4. **Commit your changes**
   ```bash
   git commit -m 'Add some amazing feature'
   ```
5. **Push to the branch**
   ```bash
   git push origin feature/amazing-feature
   ```
6. **Open a Pull Request**

### 📝 Contribution Guidelines

- **SCSS**: Follow the established architecture and use configuration functions
- **PHP**: Follow WordPress coding standards
- **JavaScript**: Use modern ES6+ syntax with appropriate transpilation
- **Documentation**: Update relevant README files and inline comments
- **Testing**: Ensure changes work across supported browsers and devices

## License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

---

## 🙏 Acknowledgments

- Built with ❤️ for the WordPress and Elementor communities
- Inspired by SMACSS methodology and modern CSS best practices
- Thanks to all contributors who help make this theme better

---

**Need help?** Check our [SCSS documentation](scss/README.md) or open an issue for support.
