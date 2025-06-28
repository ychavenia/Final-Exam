from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoAlertPresentException
from selenium.webdriver.common.alert import Alert
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
time.sleep(1)

txtPassword = driver.find_element(By.NAME, "admin_pass")
txtPassword.send_keys("wrongpass")

button = driver.find_element(By.NAME, "admin_login")
button.click()
time.sleep(2)

try:
    alert = driver.switch_to.alert
    print("Alert text:", alert.text)
    if "incorrect" in alert.text.lower():
        print("Error alert displayed for wrong credentials.")
    alert.accept()  # close the alert
except NoAlertPresentException:
    print("No alert message appeared.")

# Now check if redirected
current_url = driver.current_url
if "admin.php" in current_url:
    print("Test Failed: Redirected to admin.php even with wrong credentials.")
else:
    print("Access denied as expected for wrong login.\n")

time.sleep(2)

#correct
txtUsername = driver.find_element(By.NAME, "admin_username")
txtUsername.send_keys("admin")
time.sleep(3)

txtPassword = driver.find_element(By.NAME, "admin_pass")
txtPassword.send_keys("admin")

button = driver.find_element(By.NAME, "admin_login")
button.click()
time.sleep(1)

#open side bar
menu_button = driver.find_element(By.XPATH, "//span[text()='☰']")
menu_button.click()
time.sleep(2)

add_faculty_link = driver.find_element(By.LINK_TEXT, "Add Faculty")
add_faculty_link.click()
time.sleep(1)

#1
submit_button = driver.find_element(By.NAME, "register_faculty")
submit_button.click()
time.sleep(1)

try:
    error_msgs = driver.find_elements(By.CLASS_NAME, "error")
    if error_msgs:
        print("Empty submission test: Validation messages displayed.")
    else:
        print("Empty submission test: No validation messages.")
except:
    print("Error checking validation for empty form submission.")
time.sleep(2)

#2
emp_number_input = driver.find_element(By.NAME, "emp_number")
emp_number_input.send_keys("16-12")
time.sleep(1)

full_name_input = driver.find_element(By.NAME, "fname")
full_name_input.send_keys("Aquino, Dominique Ann M.")
time.sleep(1)

date_hired_input = driver.find_element(By.NAME, "date_hired")
driver.execute_script("arguments[0].value = arguments[1];", date_hired_input, "2024-05-12")
time.sleep(1)

status_dropdown = Select(driver.find_element(By.NAME, "status"))
status_dropdown.select_by_visible_text("Full-time Faculty")
time.sleep(1)

field_expertise_input = driver.find_element(By.NAME, "background_field")
field_expertise_input.send_keys("History")
time.sleep(1)

address_input = driver.find_element(By.NAME, "address")
address_input.send_keys("Agdangan, Quezon")
time.sleep(1)

contact_input = driver.find_element(By.NAME, "contact_no")
contact_input.send_keys("09346588245")
time.sleep(1)

email_input = driver.find_element(By.NAME, "email")
email_input.send_keys("dom") 
time.sleep(1)

password_input = driver.find_element(By.NAME, "pass")
password_input.send_keys("12345")
time.sleep(1)

submit_button = driver.find_element(By.NAME, "register_faculty")
submit_button.click()
time.sleep(1)

try:
    invalid_email_msg = driver.find_element(By.XPATH, "//small[contains(text(),'valid email')]")
    print("✅ Invalid email test: Error displayed:", invalid_email_msg.text)
except:
    print("❌ Invalid email test: No validation message for invalid email.")
time.sleep(2)

#3
emp_number_input = driver.find_element(By.NAME, "emp_number")
emp_number_input.send_keys("16-12")
time.sleep(1)

full_name_input = driver.find_element(By.NAME, "fname")
full_name_input.send_keys("Aquino, Dominique Ann M.")
time.sleep(1)

date_hired_input = driver.find_element(By.NAME, "date_hired")
driver.execute_script("arguments[0].value = arguments[1];", date_hired_input, "2024-05-12")
time.sleep(1)

status_dropdown = Select(driver.find_element(By.NAME, "status"))
status_dropdown.select_by_visible_text("Full-time Faculty")
time.sleep(1)

field_expertise_input = driver.find_element(By.NAME, "background_field")
field_expertise_input.send_keys("History")
time.sleep(1)

address_input = driver.find_element(By.NAME, "address")
address_input.send_keys("Agdangan, Quezon")
time.sleep(1)

contact_input = driver.find_element(By.NAME, "contact_no")
contact_input.send_keys("09346588245")
time.sleep(1)

email_input = driver.find_element(By.NAME, "email")
email_input.send_keys("dom@gmail.com")
time.sleep(1)

password_input = driver.find_element(By.NAME, "pass")
password_input.send_keys("12345")
time.sleep(1)

submit_button = driver.find_element(By.NAME, "register_faculty")
submit_button.click()
time.sleep(1)

input("Press Enter to close the browser...")
driver.quit()
