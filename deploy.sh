#!/bin/bash

# Deployment script for shared hosting
# This script moves Laravel public files to root for shared hosting deployment

echo "Starting deployment..."

# Copy public files to root
echo "Copying public files to root..."
cp -r public/css ./
cp -r public/js ./
cp -r public/images ./
cp public/.htaccess ./
cp public/index.php ./
cp public/favicon.ico ./

# Set permissions
echo "Setting permissions..."
chmod -R 755 css js images
chmod 644 index.php .htaccess favicon.ico

echo "Deployment completed!"
echo "Files copied:"
echo "- css/"
echo "- js/"
echo "- images/"
echo "- index.php"
echo "- .htaccess"
echo "- favicon.ico"
