# DineDivine Ventures - Deployment Guide

## 🚀 Quick Deployment Guide

### Option 1: Local Development (Recommended for Testing)

#### Using PHP Built-in Server
```bash
cd dinedivine-ventures
php -S localhost:8000
```
Then open: `http://localhost:8000`

#### Using XAMPP/WAMP/MAMP
1. Copy the `dinedivine-ventures` folder to:
   - XAMPP: `C:\xampp\htdocs\`
   - WAMP: `C:\wamp64\www\`
   - MAMP: `/Applications/MAMP/htdocs/`
2. Start Apache server
3. Open: `http://localhost/dinedivine-ventures/`

---

### Option 2: Production Deployment

#### A. Shared Hosting (cPanel)

1. **Upload Files**
   - Login to cPanel
   - Go to File Manager
   - Navigate to `public_html`
   - Upload all files from `dinedivine-ventures` folder
   - Extract if uploaded as ZIP

2. **Configure Site URL**
   - Edit `includes/config.php`
   - Change `SITE_URL` to your domain:
   ```php
   define('SITE_URL', 'https://yourdomain.com/');
   ```

3. **Set Permissions**
   - Set folder permissions to 755
   - Set file permissions to 644

4. **Test**
   - Visit your domain
   - Check all games work properly

#### B. VPS/Cloud Server (Ubuntu/Debian)

1. **Install Requirements**
```bash
sudo apt update
sudo apt install apache2 php php-cli php-mbstring php-xml -y
```

2. **Upload Files**
```bash
# Using SCP
scp -r dinedivine-ventures/ user@your-server:/var/www/html/

# Or clone from GitHub
cd /var/www/html/
git clone https://github.com/Krishnaait/divinedivine-casino.git
mv divinedivine-casino dinedivine-ventures
```

3. **Configure Apache**
```bash
sudo nano /etc/apache2/sites-available/dinedivine.conf
```

Add:
```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    DocumentRoot /var/www/html/dinedivine-ventures
    
    <Directory /var/www/html/dinedivine-ventures>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/dinedivine_error.log
    CustomLog ${APACHE_LOG_DIR}/dinedivine_access.log combined
</VirtualHost>
```

4. **Enable Site & Restart**
```bash
sudo a2ensite dinedivine.conf
sudo systemctl restart apache2
```

5. **Set Permissions**
```bash
sudo chown -R www-data:www-data /var/www/html/dinedivine-ventures
sudo chmod -R 755 /var/www/html/dinedivine-ventures
```

6. **Configure SSL (Optional but Recommended)**
```bash
sudo apt install certbot python3-certbot-apache -y
sudo certbot --apache -d yourdomain.com
```

#### C. Nginx Server

1. **Install Requirements**
```bash
sudo apt update
sudo apt install nginx php-fpm php-cli php-mbstring php-xml -y
```

2. **Configure Nginx**
```bash
sudo nano /etc/nginx/sites-available/dinedivine
```

Add:
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /var/www/html/dinedivine-ventures;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

3. **Enable Site**
```bash
sudo ln -s /etc/nginx/sites-available/dinedivine /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

---

### Option 3: Docker Deployment

1. **Create Dockerfile**
```dockerfile
FROM php:7.4-apache
COPY dinedivine-ventures/ /var/www/html/
RUN chown -R www-data:www-data /var/www/html
EXPOSE 80
```

2. **Build and Run**
```bash
docker build -t dinedivine-ventures .
docker run -d -p 8080:80 dinedivine-ventures
```

---

## 🔧 Configuration

### Update Site URL
Edit `includes/config.php`:
```php
define('SITE_URL', 'https://yourdomain.com/');
```

### Update Company Contact
```php
define('EMAIL', 'your@email.com');
define('PHONE', '+91-XXXXXXXXXX');
```

---

## ✅ Post-Deployment Checklist

- [ ] All pages load correctly
- [ ] Games are functional
- [ ] Balance system works
- [ ] Mobile responsive design works
- [ ] Forms submit properly
- [ ] Navigation works on all pages
- [ ] SSL certificate installed (for production)
- [ ] Error pages configured
- [ ] Analytics added (if needed)
- [ ] Backup system in place

---

## 🔒 Security Recommendations

1. **Enable HTTPS** - Always use SSL certificate
2. **Update PHP** - Use PHP 7.4 or higher
3. **File Permissions** - Set correct permissions (755/644)
4. **Hide PHP Version** - Add to php.ini: `expose_php = Off`
5. **Regular Backups** - Set up automated backups
6. **Update Dependencies** - Keep all software updated

---

## 🐛 Troubleshooting

### Issue: Pages show blank
**Solution**: Check PHP error logs
```bash
tail -f /var/log/apache2/error.log
```

### Issue: CSS/JS not loading
**Solution**: Check SITE_URL in config.php matches your domain

### Issue: Session errors
**Solution**: Ensure session directory is writable
```bash
sudo chmod 777 /var/lib/php/sessions
```

### Issue: 404 errors
**Solution**: Enable mod_rewrite for Apache
```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

---

## 📊 Performance Optimization

1. **Enable Gzip Compression**
```apache
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript
</IfModule>
```

2. **Enable Browser Caching**
```apache
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
</IfModule>
```

3. **Enable PHP OPcache**
Add to php.ini:
```ini
opcache.enable=1
opcache.memory_consumption=128
opcache.max_accelerated_files=10000
```

---

## 📞 Support

For deployment issues, contact: contact@dinedivine.com

---

**Repository**: https://github.com/Krishnaait/divinedivine-casino

**Made with ❤️ by DineDivine Ventures**
