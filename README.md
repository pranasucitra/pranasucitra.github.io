# Portfolio Website - Lingga Pranasucitra

A professional portfolio website for a Senior Full Stack Developer built with pure HTML, CSS, and JavaScript + jQuery.

## Features

- Single page with smooth scroll navigation
- Dark theme with modern design
- Mobile responsive
- jQuery animations and interactions
- Typing animation in hero section
- Scroll-triggered fade-in animations
- Easy to edit and maintain

## Getting Started

### Prerequisites

- Any modern web browser
- A code editor (VS Code recommended)

### Installation

1. Clone this repository or download the files
2. Place your profile photo at `assets/img/profile.jpg`
3. Place your CV at `assets/files/cv.pdf`
4. Add project screenshots at `assets/img/projects/`
5. Edit `index.html` to add your content

### Editing Content

All editable sections in `index.html` are marked with comments:
- `<!-- EDIT: ... -->`

Key sections to edit:
- Experience timeline entries
- Project details
- Contact information (email, links)

### Changing Colors

Edit CSS variables in `css/style.css`:
```css
:root {
    --accent: #78B8A6;
    --bg: #1A1A2E;
    --card: #16213E;
    --surface: #0F3460;
}
```

## Deployment to GitHub Pages

1. Go to your GitHub repository
2. Navigate to Settings > Pages
3. Under "Source", select "main" branch
4. Click Save
5. Your site will be available at `https://username.github.io`

## File Structure

```
pranasucitra.github.io/
├── index.html          (main file)
├── css/
│   └── style.css       (all styles)
├── js/
│   └── main.js        (jQuery animations & interactions)
├── assets/
│   ├── img/
│   │   ├── profile.jpg    (your photo)
│   │   └── projects/   (project screenshots)
│   └── files/
│       └── cv.pdf     (downloadable CV)
└── README.md
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## License

This project is for personal use. Edit and customize as needed.