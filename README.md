## Timetable Management - Quản lý thời khóa biểu
Quản lý thời khóa biểu sử dụng PHP và MySQL

### Hướng dẫn bắt đầu làm việc
Clone **repo** về máy
```
git clone https://gitlab.com/sownt/timetable-management.git && cd timetable-management
```
Config git
```
git config user.name "GITLAB_USERNAME"
git config user.email "GITLAB_EMAIL"
```
Chuyển sang branch của mình, ví dụ `dev/auth`
```
git checkout dev/auth
```
Khi hoàn thành, tạo [Merge Request](https://gitlab.com/sownt/timetable-management/-/merge_requests) vào branch `dev` để bắt đầu tích hợp lại

### Thành viên
| Mã sinh viên | Họ và tên | Branch | Nhiệm vụ |
| :---: | :--- | :--- | :--- |
| 19000458 | Nguyễn Anh Nguyễn | `dev/auth` | Login, logout |
| 19000460 | Hoàng Nghĩa Phong | `dev/password` | Cấp lại Password |
| 19000465 | Phạm Duy Phương | `dev/teacher` | Tìm kiếm, xem chi tiết thông tin giáo viên |
| 19000468 | Nguyễn Minh Quang | `dev/add-teacher` | Thêm mới giáo viên |
| 19000470 | Phạm Vũ Anh Quân | `dev/modify-teacher` | Sửa thông tin giáo viên |
| 19000471 | Tạ Anh Quân | `dev/lecture` | Tìm kiếm, xem chi tiết thông tin môn học |
| 19000475 | Trần Thái Sơn | `dev/add-lecture` | Thêm mới môn học |
| 19000486 | Đỗ Ánh Tuyết | `dev/home` | Màn hình Home (có phân quyền) |
| 19000490 | Đặng Thị Phương Thúy | `dev/modify-lecture` | Sửa thông tin môn học |
| 19000491 | Phạm Vũ Thư | `dev/time` | Tìm kiếm/filter thời gian học của giáo viên hoặc môn học |
| 19000492 | Phạm Xuân Thường | `dev/schedule` | Lập thời khóa biểu (phân công giao viên nào dạy môn nào vào thời gian nào) |
| 19000493 | Nguyễn Thị Thảo Trang | `dev/modify-timetable` | Sửa thời khóa biểu |