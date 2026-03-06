@echo off
setlocal EnableDelayedExpansion

echo.
echo  ==========================================
echo   HarmaalWale - Deploy
echo  ==========================================
echo.

set /p MSG="What changed? "
if "!MSG!"=="" set MSG=update

echo.
echo  Pushing to GitHub...
git add -A
git commit -m "!MSG!"
git push origin main

echo.
echo  ==========================================
echo   Pushed! GitHub is now auto-deploying
echo   to harmaalwale.com via cPanel.
echo.  
echo   Site will be live in ~20 seconds.
echo   github.com/harmaalwale/harmaalwale.com/actions
echo  ==========================================
echo.
pause
