from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.support.ui import Select
from selenium.common.exceptions import NoAlertPresentException
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
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
txtUsername.send_keys("yezza")
time.sleep(1)

txtPassword = driver.find_element(By.NAME, "admin_pass")
txtPassword.send_keys("yezza")

button = driver.find_element(By.NAME, "admin_login")
button.click()
time.sleep(2)

try:
    alert = driver.switch_to.alert
    print("Alert text:", alert.text)
    if "incorrect" in alert.text.lower():
        print("Error alert displayed for wrong credentials.")
    alert.accept()  
except NoAlertPresentException:
    print("No alert message appeared.")

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
password_input.send_keys("09079213473")
time.sleep(1)

submit_button = driver.find_element(By.NAME, "register_faculty")
submit_button.click()
time.sleep(1)

#3
email_input = driver.find_element(By.NAME, "email")
email_input.send_keys("@gmail.com")
time.sleep(1)

submit_button = driver.find_element(By.NAME, "register_faculty")
submit_button.click()
time.sleep(2)

#add subject
driver.get("http://localhost/ocss/admin.php")
time.sleep(2)

menu_button = driver.find_element(By.XPATH, "//span[text()='☰']")
menu_button.click()
time.sleep(1)

add_subject_link = driver.find_element(By.LINK_TEXT, "Add Subject")
add_subject_link.click()
time.sleep(1)

subject_code_input = driver.find_element(By.NAME, "subject_code")
subject_code_input.send_keys("CS101")
time.sleep(1)

subject_desc_input = driver.find_element(By.NAME, "subject_description")
subject_desc_input.send_keys("Introduction to Computer Science")
time.sleep(1)

unit_dropdown = Select(driver.find_element(By.NAME, "unit"))
unit_dropdown.select_by_value("3")  
time.sleep(1)

lecture_dropdown = Select(driver.find_element(By.NAME, "lecture"))
lecture_dropdown.select_by_value("3")
time.sleep(1)

lab_dropdown = Select(driver.find_element(By.NAME, "laboratory"))
lab_dropdown.select_by_value("2")
time.sleep(1)

add_subject_button = driver.find_element(By.NAME, "add")
add_subject_button.click()

#add room
driver.get("http://localhost/ocss/admin.php")
time.sleep(2)

menu_button = driver.find_element(By.XPATH, "//span[text()='☰']")
menu_button.click()
time.sleep(1)

add_room_link = driver.find_element(By.LINK_TEXT, "Add Room")
add_room_link.click()
time.sleep(1)

room_input = driver.find_element(By.NAME, "room")
room_input.send_keys("111")
time.sleep(1)

add_room_button = driver.find_element(By.NAME, "add_room")
add_room_button.click()
time.sleep(1)

#create sched
driver.get("http://localhost/ocss/admin.php")
time.sleep(2)

menu_button = driver.find_element(By.XPATH, "//span[text()='☰']")
menu_button.click()
time.sleep(1)

create_schedule_link = driver.find_element(By.LINK_TEXT, "Create Schedule")
create_schedule_link.click()
time.sleep(1)

subject_dropdown = Select(driver.find_element(By.NAME, "subject_description"))
subject_dropdown.select_by_visible_text("Computer Programming")
time.sleep(1)

day_dropdown = Select(driver.find_element(By.NAME, "day_description"))
day_dropdown.select_by_visible_text("T F")
time.sleep(1)

time_dropdown = Select(driver.find_element(By.NAME, "time_description"))
time_dropdown.select_by_visible_text("10:30-12:00")
time.sleep(1)

room_dropdown = Select(driver.find_element(By.NAME, "room_description"))
room_dropdown.select_by_visible_text("103")
time.sleep(1)

faculty_dropdown = Select(driver.find_element(By.NAME, "fname"))
faculty_dropdown.select_by_visible_text("Janoras, Annabel S.")
time.sleep(1)

save_button = driver.find_element(By.NAME, "add_schedule")
save_button.click()


input("Press Enter to close the browser...")
driver.quit()
time.sleep(1)