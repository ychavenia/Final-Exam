from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
import time

service = Service('chromedriver.exe')  
driver = webdriver.Chrome(service=service)

#GET THE SITE
driver.get("http://localhost/ocss/admin_login.php")
driver.maximize_window()
time.sleep(5)

#wrong credentials test
txtUsername = driver.find_element(By.NAME, "admin_username")
txtUsername.send_keys("wrongadmin")
time.sleep(3)

txtPassword = driver.find_element(By.NAME, "admin_pass")
txtPassword.send_keys("wrongpass")

button = driver.find_element(By.NAME, "admin_login")
button.click()
time.sleep(2)

try:
    error = driver.find_element(By.XPATH, "//div[contains(text(),'Invalid') or contains(text(),'incorrect')]")  # adjust this if needed
    print("✅ Error message displayed:", error.text)
except:
    print("❌ No error message displayed for wrong credentials.")

current_url = driver.current_url
if "admin.php" in current_url:
    print("❌ Test Failed: Redirected to admin.php even with wrong credentials.")
else:
    print("✅ Access denied as expected for wrong login.\n")
time.sleep(2)

#correct
txtUsername = driver.find_element(By.NAME, "admin_username")
txtUsername.send_keys("admin")
time.sleep(3)

txtPassword = driver.find_element(By.NAME, "admin_pass")
txtPassword.send_keys("admin")

button = driver.find_element(By.NAME, "admin_login")
button.click()

input("Press Enter to close the browser...")
driver.quit()
