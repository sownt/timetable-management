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
Chuyển sang branch của mình, ví dụ `feature/auth`
```
git checkout feature/auth
```
Khi hoàn thành, tạo [Merge Request](https://gitlab.com/sownt/timetable-management/-/merge_requests) vào branch `dev` để bắt đầu tích hợp lại

### Thành viên
| Mã sinh viên | Họ và tên | Branch | Nhiệm vụ |
| :---: | :--- | :--- | :--- |
| 19000458 | Nguyễn Anh Nguyễn | `feature/auth` | Login, logout |
| 19000460 | Hoàng Nghĩa Phong | `feature/password` | Cấp lại Password |
| 19000465 | Phạm Duy Phương | `feature/teacher` | Tìm kiếm, xem chi tiết thông tin giáo viên |
| 19000468 | Nguyễn Minh Quang | `feature/add-teacher` | Thêm mới giáo viên |
| 19000470 | Phạm Vũ Anh Quân | `feature/modify-teacher` | Sửa thông tin giáo viên |
| 19000471 | Tạ Anh Quân | `feature/lecture` | Tìm kiếm, xem chi tiết thông tin môn học |
| 19000475 | Trần Thái Sơn | `feature/add-lecture` | Thêm mới môn học |
| 19000486 | Đỗ Ánh Tuyết | `feature/home` | Màn hình Home (có phân quyền) |
| 19000490 | Đặng Thị Phương Thúy | `feature/modify-lecture` | Sửa thông tin môn học |
| 19000491 | Phạm Vũ Thư | `feature/time` | Tìm kiếm/filter thời gian học của giáo viên hoặc môn học |
| 19000492 | Phạm Xuân Thường | `feature/schedule` | Lập thời khóa biểu (phân công giao viên nào dạy môn nào vào thời gian nào) |
| 19000493 | Nguyễn Thị Thảo Trang | `feature/modify-timetable` | Sửa thời khóa biểu |