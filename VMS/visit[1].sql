

CREATE TABLE student (
    roll_no VARCHAR(10) PRIMARY KEY,
    student_name VARCHAR(255),
    department VARCHAR(255),
    phone VARCHAR(20)
);
CREATE TABLE staff (
    staff_id VARCHAR(5) PRIMARY KEY,
    staff_name VARCHAR(255),
    department VARCHAR(255),
    phone VARCHAR(20)
);
CREATE TABLE visitor (
    visitor_id INT AUTO_INCREMENT PRIMARY KEY,
    visitor_name VARCHAR(255),
    whom_to_visit_id VARCHAR(255),
      -- This can refer to either student.roll_no or staff.staff_id
    
    phone VARCHAR(20)
    
);
CREATE TABLE admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    admin_name VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(10)
);

CREATE TABLE user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'student', 'visitor', 'staff') NOT NULL,
    student_id VARCHAR(10),
    staff_id VARCHAR(5),
    visitor_id INT,
    admin_id INT,
    CONSTRAINT fk_user_student FOREIGN KEY (student_id) REFERENCES student(roll_no),
    CONSTRAINT fk_user_staff FOREIGN KEY (staff_id) REFERENCES staff(staff_id),
    CONSTRAINT fk_user_visitor FOREIGN KEY (visitor_id) REFERENCES visitor(visitor_id),
    CONSTRAINT fk_user_admin FOREIGN KEY (admin_id) REFERENCES admin(admin_id),
    
    -- Enforce only one of the three IDs can be set depending on role
    CHECK (
        (role = 'student' AND student_id IS NOT NULL AND staff_id IS NULL AND visitor_id IS NULL) OR
        (role = 'staff' AND staff_id IS NOT NULL AND student_id IS NULL AND visitor_id IS NULL) OR
        (role = 'visitor' AND visitor_id IS NOT NULL AND student_id IS NULL AND staff_id IS NULL) OR
        (role = 'admin' AND student_id IS NULL AND staff_id IS NULL AND visitor_id IS NULL)
    )
);

CREATE TABLE requests (
    request_id INT AUTO_INCREMENT PRIMARY KEY,
    professional_id varchar(10),
    name VARCHAR(255),
    role VARCHAR(255),
    purpose TEXT,
    direction ENUM('In', 'Out'),
    visit_date DATETIME,
    status ENUM('Pending', 'Approved', 'Rejected'),
    submitted DATETIME
);
-- CREATE TABLE passes (
--     visit_id INT AUTO_INCREMENT PRIMARY KEY,
    
--     username_qr varchar(255),
--     purpose_of_visit VARCHAR(255),
--     status ENUM('active', 'inactive'),
--     student_id VARCHAR(10),
--     staff_id VARCHAR(5),
--     visitor_id INT,
--     admin_id INT,
--     visitor_id INT,  -- Links to visitor
--     time_submitted NOW(),
--     CONSTRAINT fk_user_student FOREIGN KEY (student_id) REFERENCES student(roll_no),
--     CONSTRAINT fk_user_staff FOREIGN KEY (staff_id) REFERENCES staff(staff_id),
--     CONSTRAINT fk_user_visitor FOREIGN KEY (visitor_id) REFERENCES visitor(visitor_id),
--     CONSTRAINT fk_user_admin FOREIGN KEY (admin_id) REFERENCES admin(admin_id), 

--     CHECK (
--         (role = 'student' AND student_id IS NOT NULL AND staff_id IS NULL AND visitor_id IS NULL) OR
--         (role = 'staff' AND staff_id IS NOT NULL AND student_id IS NULL AND visitor_id IS NULL) OR
--         (role = 'visitor' AND visitor_id IS NOT NULL AND student_id IS NULL AND staff_id IS NULL) OR
--         (role = 'admin' AND student_id IS NULL AND staff_id IS NULL AND visitor_id IS NULL)
--     )
    
-- );

-- SELECT v.visitor_name, v.date_of_visit, p.entry_time, p.exit_time, p.status
-- FROM passes p
-- JOIN visitor v ON p.visitor_id = v.visitor_id
-- WHERE v.meeting_with_id = 101;
