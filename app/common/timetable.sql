--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL PRIMARY KEY,
  `login_id` varchar(20) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `actived_flag` int(1) DEFAULT NULL,
  `reset_password_token` varchar(100) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) 
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `schedules`
--

CREATE TABLE `schedules` (
  `id` int(10) NOT NULL PRIMARY KEY,
  `school_year` char(10) DEFAULT NULL,
  `subject_id` int(10) DEFAULT NULL,
  `teacher_id` int(10) DEFAULT NULL,
  `week_day` char(10) DEFAULT NULL,
  `lession` char(10) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
)

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) NOT NULL PRIMARY KEY,
  `name` varchar(250) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `school_year` char(10) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) 

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL PRIMARY KEY,
  `name` varchar(250) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `specialized` char(10) DEFAULT NULL,
  `degree` char(10) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
)