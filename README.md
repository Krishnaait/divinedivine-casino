# DineDivine Ventures - Gaming Platform

A premium gaming platform built with HTML, CSS, PHP, and JavaScript featuring multiple exciting games with beautiful UI/UX design.

## 🎮 Features

### Games
- **Dice Game**: Roll the dice and predict outcomes (High/Low)
- **Chicken Game**: Guide the chicken through an adventure with obstacles
- **Mines Game**: Uncover safe tiles and avoid mines with multiplying rewards
- **Plinko Game**: Drop balls through pegs and land in high-value slots

### Platform Features
- Beautiful, responsive design with modern UI
- Real-time balance management
- Game statistics and history tracking
- Smooth animations and transitions
- Mobile-friendly interface
- Secure session management
- Fair game algorithms

## 🏢 Company Information

**DineDivine Ventures Private Limited**
- CIN: U56102HR2024PTC123713
- GST No: 06AALCD0239Q1ZA
- PAN No: AALCD0239Q
- Address: C/O Pardeep Saggar, 20-P DSC, Sec-23A, Shivaji Nagar, Gurgaon - 122001, Haryana

## 🛠️ Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript (Vanilla)
- **Backend**: PHP 7.4+
- **Architecture**: MVC-based structure
- **Styling**: CSS Grid, Flexbox, CSS Variables
- **Animations**: CSS Keyframes, JavaScript transitions

## 📁 Project Structure

```
dinedivine-ventures/
├── index.php                 # Home page
├── includes/
│   ├── config.php           # Configuration and helpers
│   ├── header.php           # Navigation header
│   └── footer.php           # Footer
├── pages/
│   ├── games.php            # Games listing page
│   ├── about.php            # About us page
│   ├── contact.php          # Contact page
│   ├── privacy.php          # Privacy policy
│   ├── terms.php            # Terms & conditions
│   └── disclaimer.php       # Disclaimer
├── games/
│   ├── dice.php             # Dice game
│   ├── chicken.php          # Chicken game
│   ├── mines.php            # Mines game
│   └── plinko.php           # Plinko game
├── api/
│   ├── update-balance.php   # Balance update endpoint
│   ├── get-balance.php      # Get balance endpoint
│   └── reset-balance.php    # Reset balance endpoint
├── assets/
│   ├── css/
│   │   ├── global.css       # Global styles
│   │   └── responsive.css   # Responsive design
│   ├── js/
│   │   └── main.js          # Main JavaScript
│   └── images/              # Images and assets
└── README.md
```

## 🚀 Getting Started

### Prerequisites
- PHP 7.4 or higher
- Web server (Apache, Nginx, etc.)
- Modern web browser

### Installation

1. **Clone the repository**
```bash
git clone https://github.com/yourusername/dinedivine-ventures.git
cd dinedivine-ventures
```

2. **Set up web server**
```bash
# For Apache, create virtual host or place in htdocs
# For PHP built-in server:
php -S localhost:8000
```

3. **Access the application**
```
Open browser and navigate to:
http://localhost:8000
```

## 🎯 Game Rules

### Dice Game
- Predict if the sum of two dice will be HIGH (8-12) or LOW (2-7)
- Win: Get 2x your bet amount
- Loss: Lose your bet amount

### Chicken Game
- Guide the chicken using Arrow Keys or WASD
- Collect coins for bonus points
- Avoid obstacles
- Longer distance = Higher multiplier

### Mines Game
- Click tiles to reveal them
- Find safe tiles to increase multiplier
- Avoid mines (game ends if you hit one)
- Cash out anytime to secure winnings
- Multiplier increases by 0.15x for each safe tile

### Plinko Game
- Drop the ball from the top
- Ball bounces through pegs
- Land in slots for rewards
- Multipliers: 0.5x to 5.0x depending on slot

## 💰 Betting System

- **Initial Balance**: ₹1000
- **Minimum Bet**: ₹10
- **Maximum Bet**: ₹10,000
- **Reset Button**: Available in navigation to reset balance

## 🎨 Design Features

### Color Scheme
- Primary: #ff6b35 (Orange)
- Secondary: #004e89 (Dark Blue)
- Accent: #ffd700 (Gold)
- Background: Dark gradient (Modern dark theme)

### Responsive Design
- Desktop (1200px+)
- Tablet (768px - 1199px)
- Mobile (480px - 767px)
- Small phones (< 480px)

### Animations
- Smooth fade-in effects
- Hover transitions
- Game-specific animations
- Shimmer effects

## 🔒 Security Features

- Session-based user management
- Input validation
- CSRF protection ready
- Secure balance management
- Fair game algorithms

## 📱 Browser Support

- Chrome (Latest)
- Firefox (Latest)
- Safari (Latest)
- Edge (Latest)
- Mobile browsers

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is proprietary and owned by DineDivine Ventures Private Limited.

## 📞 Support

For support, email: contact@dinedivine.com

## 🙏 Acknowledgments

- Built with modern web technologies
- Inspired by premium gaming platforms
- Designed for user experience and engagement

---

**Made with ❤️ by DineDivine Ventures**
