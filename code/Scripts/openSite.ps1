# URL website
$URL = "https://www.dewagenwinkel.be"

#Default path to Firefox
$firefoxPath = "C:\Program Files\Mozilla Firefox\firefox.exe"
$firefoxPathX86 = "C:\Program Files (x86)\Mozilla Firefox\firefox.exe"

#Download URL firefox
$firefoxInstallerUrl = "https://download.mozilla.org/?product=firefox-latest&os=win64&lang=en-US"
$firefoxInstallerPath = "$env:TEMP\FirefoxInstaller.exe"


function Install-Firefox {
    Write-Host "Firefox is not installed. Downloading and installing..."

    # Download installer
    Invoke-WebRequest -Uri $firefoxInstallerUrl -OutFile $firefoxInstallerPath

    # Run the installer
    Start-Process -FilePath $firefoxInstallerPath -ArgumentList "/S" -Wait

    if (Test-Path $firefoxPath -or Test-Path $firefoxPathX86) {
        Write-Host "Firefox has been successfully installed."
    } else {
        Write-Host "Firefox installation failed."
        exit
    }
}

#Check if firefox on system
if (!(Test-Path $firefoxPath) -and !(Test-Path $firefoxPathX86)) {
    Install-Firefox
}

# Open Firefox in fullscreen (kiosk mode) with the URL
if (Test-Path $firefoxPath) {
    Start-Process $firefoxPath -ArgumentList "$URL -kiosk"
} elseif (Test-Path $firefoxPathX86) {
    Start-Process $firefoxPathX86 -ArgumentList "$URL -kiosk"
} else {
    Write-Host "Firefox is not installed, and installation failed."
}
