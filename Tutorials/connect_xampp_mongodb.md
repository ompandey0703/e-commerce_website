# Connect XAMPP to MongoDB

Follow these steps to connect XAMPP to MongoDB:

1. Download the MongoDB drivers for Windows from [here](https://pecl.php.net/package/mongodb). Select the "DLL" link for the version you want, scroll to the bottom of the next page, then download from the "DLL List" section for your version of PHP and OS architecture.

2. Extract the downloaded archive.

3. Copy the extracted `php_mongodb.dll` file into your `<drive>:\xampp\php\ext` folder. Replace `<drive>` with the drive letter where XAMPP is installed.

4. Open the `php.ini` file in your XAMPP installation. You can do this by clicking on the "Config" button next to "Apache" in the XAMPP control panel and selecting `php.ini`.

5. Add the following line to the `php.ini` file:

    ```ini
    extension=php_mongodb.dll
    ```

6. Save the `php.ini` file and close it.

7. Restart the Apache server in XAMPP. You can do this by clicking on the "Stop" button next to "Apache" in the XAMPP control panel, then clicking on the "Start" button.

You should now be able to use MongoDB with PHP in XAMPP.

# Setting MongoDB Environment Variable

Follow these steps to set the MongoDB environment variable on a Windows machine:

1. Locate the directory where MongoDB is installed. This is typically `C:\Program Files\MongoDB\Server\4.4\bin`, but it may vary depending on your MongoDB version and installation preferences. Make sure to replace `4.4` with your actual MongoDB version.

2. Copy the path to the `bin` directory.

3. Open the System Properties window. You can do this by right-clicking on "This PC" or "My Computer" and selecting "Properties", then clicking on "Advanced system settings".

4. Click on "Environment Variables...".

5. In the Environment Variables window, under the "System variables" section, find and select the "Path" variable, then click on "Edit...".

6. In the Edit Environment Variable window, click on "New", then paste the path to your MongoDB `bin` directory.

7. Click "OK" in all windows to save the changes.

Now, you should be able to run MongoDB commands from any directory in the Command Prompt.