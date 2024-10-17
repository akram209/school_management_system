School Management System (SMS)
Overview
The School Management System (SMS) is a web-based application built with Laravel that streamlines and manages school operations, including student registration, attendance tracking, assignment submission, exam management, fee tracking, and much more. The system offers a role-based interface tailored to the needs of students, teachers, parents, and administrators.

Features
1. User Roles and Access Levels
Students:
View personal profile, academic performance, timetable, assignments, grades, results, and attendance records.
Submit assignments online and update them until the deadline.
View fee status, class information, subjects, and upcoming and past exam details.
Register using a permission code sent via email.
Teachers:
View and manage class schedules, student profiles, assignments, and attendance.
Mark attendance, grade assignments and exams, and communicate with students and parents.
Create and manage assignments, exams, and provide feedback.
Parents:
View children's profiles, attendance, grades, assignments, and fee status.
Communicate with teachers and track academic progress.
Receive notifications and pay school fees offline.
Administrators:
Manage student, teacher, and parent profiles.
Oversee academic records, class schedules, fee status, and school-wide announcements.
Create, update, or delete user accounts, and manage permissions, assignments, and exams.
2. Livewire Components
Real-time interactions and updates without refreshing the page, including:

Student and teacher attendance tracking.
Live search and pagination for large student and parent records.
Score management for assignments and exams.
3. Queue and Jobs
Notification and Permission Jobs: Notifications and permission codes are processed in the background to ensure system performance.
Assignments and Exams Job: Handles large data insertions for marking assignments and exams when deadlines pass.
Payment Update Job: Automatically updates teacher payment status on the 10th and 25th of each month.
4. API Endpoints
Retrieve assignment and attendance percentages for students.
Get fee payment status for students.
5. Authentication and Authorization
Laravel Breeze for authentication, tailored to project needs.
Middleware for server-side authorization.
Policy Gates for client-side role-based access control, used to display appropriate sidebar components for each user role.
6. Dashboard
Admin dashboard includes charts (using Laravel Charts) to display user metrics by date and role.
Fee payment statuses are color-coded for better visualization (red for unpaid over a month, yellow for unpaid for 2 weeks).
7. Database Management
Utilizes Laravel ORM and query builder for simple and complex queries.
Eager Loading is used for large data sets, and Lazy Loading for smaller, less frequently accessed data.
8. Future Enhancements
Mobile app development with push notifications.
Enhanced analytics and reporting for academic performance.
Biometric attendance tracking and integration with external educational tools.
