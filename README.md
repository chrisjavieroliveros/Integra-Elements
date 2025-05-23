# Integra Elements

A modern, performance-optimized WordPress theme built for Elementor with a sophisticated SCSS architecture. Modular, scalable, and developer-friendly.

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

Integra Elements is a WordPress theme designed specifically for Elementor page builder, providing custom widgets and a robust styling framework. The theme is built with performance, accessibility, and extensibility in mind.

## Features

- **Optimized for Elementor**: Custom widgets and seamless integration
- **Advanced SCSS Architecture**: Based on SMACSS principles with centralized configuration
- **Performance-Focused**: Minimized assets, optimized loading, and clean code
- **Mobile-First Responsive Design**: Looks great on any device
- **Developer-Friendly**: Well-documented code with consistent naming conventions
- **Accessibility Ready**: WCAG 2.1 compliant markup and design
- **SEO Optimized**: Following best practices for search engine visibility

## Installation

1. **Download the theme**

   - Download the theme ZIP file from the repository

2. **Install via WordPress Admin**

   - Go to Appearance > Themes > Add New > Upload Theme
   - Choose the downloaded ZIP file and click "Install Now"
   - Activate the theme

3. **Required Plugins**
   - Elementor Page Builder
   - [Any other required plugins]

## Elementor Widgets

Integra Elements includes several custom Elementor widgets to enhance your page building experience:

- **Advanced Cards**: Flexible content cards with multiple layout options
- **Team Members**: Display team profiles with social media links
- **Testimonial Slider**: Showcase customer testimonials
- **Feature Grid**: Highlight product/service features
- **Call to Action**: Conversion-focused CTA sections
- [Other widgets...]

### Using Elementor Widgets

1. Edit a page with Elementor
2. Look for the "Integra Elements" section in the Elementor panel
3. Drag and drop widgets onto your page
4. Customize settings through the Elementor interface

## SCSS Architecture

The theme utilizes a streamlined SCSS architecture based on SMACSS principles with centralized configuration. This provides consistent styling and makes customization straightforward.

### Directory Structure

```
/scss/
├── main.scss              # Main entry file
├── config/                # Centralized configuration
│   ├── __index.scss       # Forwards all config files
│   ├── _colors.scss       # Color configuration
│   ├── _typography.scss   # Typography configuration
│   ├── _spacing.scss      # Spacing configuration
│   └── _breakpoints.scss  # Responsive breakpoints
├── base/                  # Base styles
├── layouts/               # Layout styles
├── components/            # Reusable UI components
├── utilities/             # Utility classes
└── pages/                 # Page-specific styles
```

### Key Features of the SCSS System

- **Design Token System**: Centralized design variables
- **Utility-First Approach**: Comprehensive utility classes
- **Component-Based**: Self-contained, reusable components
- **Responsive Framework**: Built-in breakpoint system
- **BEM Methodology**: Consistent naming conventions

For detailed documentation on using the SCSS architecture, see the [SCSS README](/wp-content/themes/WP-Integra-Elements/scss/README.md).

## Theme Customization

### Using the WordPress Customizer

1. Go to Appearance > Customize
2. Adjust available settings for:
   - Site Identity
   - Colors
   - Typography
   - Layout Options
   - Header & Footer
   - [Other customization options...]

### Advanced Customization

For developers looking to extend the theme:

1. Create a child theme for major customizations
2. Use the available hooks and filters
3. Extend the SCSS architecture by adding new modules

## Development

### Prerequisites

- Node.js (v14+)
- npm or yarn
- Local WordPress development environment

### Setup Development Environment

1. Clone the repository

```bash
git clone [repository-url]
cd WP-Integra-Elements
```

2. Install dependencies

```bash
npm install
```

3. Run development build with watch

```bash
npm run dev
```

### Build for Production

```bash
npm run build
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)
- iOS Safari (latest - 1)
- Android Chrome (latest - 1)

## Contributing

Contributions are welcome and appreciated! Please follow these steps:

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the [LICENSE NAME] - see the LICENSE file for details.
