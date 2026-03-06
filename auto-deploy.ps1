param(
    [string]$message = "auto: update from Claude"
)

cd C:\Harmaalwale\Website

git add .
git commit -m $message
git push origin main

Write-Host "✅ Code pushed. Deployment triggered."