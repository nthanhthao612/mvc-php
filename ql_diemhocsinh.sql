CREATE DATABASE ql_diemhocsinh CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE hocsinh
(
    mahs INT(10),
    hotendem VARCHAR(255),
    ten VARCHAR(255),
    malop VARCHAR(10),
    gioitinh VARCHAR(3),
    nam INT(4),
    ngaysinh DATE,
    diachi VARCHAR(255),
    CONSTRAINT hocsinh_PK PRIMARY KEY (mahs)
);
CREATE TABLE lop
(
    magv INT(9),
    makhoi VARCHAR(2) NOT NULL,
    malop VARCHAR(10) NOT NULL,
    manm VARCHAR(2),
    CONSTRAINT PK_lop PRIMARY KEY (malop)
);
CREATE TABLE bangdiem
(
    mamh VARCHAR(3),
    mahs INT(10),
    mahk INT(1),
    magv INT(9),
    namhoc INT(4),
    diemmieng float(2,1),
    diem15p float(2,1),
    diem1tiet float(2,1),
    diemhk float(2,1),
    diemtb float(2,1)
);
CREATE TABLE monhoc
(
    mamh VARCHAR(3),
    tenmh VARCHAR(255),
    manm VARCHAR(2),
    PRIMARY KEY(mamh)
);
CREATE TABLE nhommon
(
    manm VARCHAR(1),
    tennm VARCHAR(255),
    PRIMARY KEY(manm)
);

CREATE TABLE giaovien
(
    magv INT(9),
    hotendemgv VARCHAR(255),
    tengv VARCHAR(255),
    mamh VARCHAR(3),
    namgv INT,
    gioitinh VARCHAR(3),
    ngaysinh DATE,
    diachi VARCHAR(255),
    PRIMARY KEY(magv)
);
CREATE TABLE taikhoan
(
    tentk VARCHAR(10),
    matkhau VARCHAR(255),
    magv INT(9),
    mahs INT(9),
    quyen VARCHAR(5)
);
CREATE TABLE tongket
(
    mahs INT(10),
    mahk INT(1),
    diemtk float(2,1),
    xeploai VARCHAR(30),
    namhoc INT(4)
);
CREATE TABLE monphutrach
(
    magv INT(9),
    malop VARCHAR(10),
    mamh VARCHAR(3)
);

ALTER TABLE `lop`
ADD CONSTRAINT `FK_lop_giaovien`
FOREIGN KEY (magv) REFERENCES giaovien(magv);

ALTER TABLE `hocsinh`
ADD CONSTRAINT `FK_hocsinh_lop`
FOREIGN KEY (malop) REFERENCES lop(malop);

ALTER TABLE `tongket`
ADD CONSTRAINT `FK_tongket_hocsinh_mahs`
FOREIGN KEY (mahs) REFERENCES hocsinh(mahs);

ALTER TABLE `bangdiem`
ADD CONSTRAINT `FK_bangdiem_hocsinh`
FOREIGN KEY (mahs) REFERENCES hocsinh(mahs);

ALTER TABLE `bangdiem`
ADD CONSTRAINT `FK_bangdiem_giaovien`
FOREIGN KEY (magv) REFERENCES giaovien(magv);

ALTER TABLE `bangdiem`
ADD CONSTRAINT `FK_bangdiem_monhoc`
FOREIGN KEY (mamh) REFERENCES monhoc(mamh);

ALTER TABLE `lop`
ADD CONSTRAINT `FK_lop_nhommon`
FOREIGN KEY (manm) REFERENCES nhommon(manm);

ALTER TABLE `taikhoan`
ADD CONSTRAINT `FK_taikhoan_giaovien`
FOREIGN KEY (magv) REFERENCES giaovien(magv);


ALTER TABLE `taikhoan`
ADD CONSTRAINT `FK_taikhoan_hocsinh`
FOREIGN KEY (mahs) REFERENCES hocsinh(mahs);


ALTER TABLE `monphutrach`
ADD CONSTRAINT `FK_monphutrach_giaovien`
FOREIGN KEY (magv) REFERENCES giaovien(magv);

ALTER TABLE `monphutrach`
ADD CONSTRAINT `FK_monphutrach_lop`
FOREIGN KEY (malop) REFERENCES lop(malop);

ALTER TABLE `monphutrach`
ADD CONSTRAINT `FK_monphutrach_monhoc`
FOREIGN KEY (mamh) REFERENCES monhoc(mamh);

INSERT INTO `taikhoan` (`tentk`, `matkhau`, `magv`, `mahs`, `quyen`) VALUES
('admin', 'c81e728d9d4c2f636f067f89cc14862c', NULL, NULL, 'admin');

INSERT INTO `nhommon` (`manm`, `tennm`) VALUES
('A','Tự nhiên'),
('T','Tự chọn'),
('D','Xã hội');

INSERT INTO `monhoc` (`mamh`, `tenmh`,`manm`) VALUES
('AV', 'Anh văn','T'),
('DL', 'Địa lí','D'),
('GD', 'Giáo dục công dân','D'),
('HH', 'Hóa học','A'),
('LS', 'Lịch sử','D'),
('NV', 'Ngữ văn','D'),
('SH', 'Sinh học','A'),
('TH', 'Tin học','T'),
('TO', 'Toán','A'),
('VL', 'Vật lí','A');


INSERT INTO `giaovien` (`magv`, `hotendemgv`, `tengv`, `mamh`, `namgv`, `gioitinh`, `ngaysinh`, `diachi`) VALUES
(412014001, 'Nguyễn Văn', 'Hậu', 'VL', 2014, 'Nam', '1990-06-05', 'Lâm Đồng'),
(412014002, 'Hà Lê Thúy', 'Quỳnh', 'TO', 2014, 'Nữ', '1998-12-20', 'Phú Yên'),
(412016001, 'Hồ Quỳnh', 'Hương', 'SH', 2016, 'Nữ', '1992-03-19', 'Khánh Hòa'),
(412018001, 'Trần Thanh', 'Hùng', 'HH', 2018, 'Nam', '1994-05-06', 'Phú Yên'),
(442014001, 'Phạm Phước', 'Lộc', 'NV', 2014, 'Nam', '1990-02-01', 'Phú Yên'),
(442016001, 'Nguyễn Đỗ Thanh', 'Trà', 'DL', 2016, 'Nữ', '1993-06-17', 'Phú Yên'),
(442017001, 'Trần Phi', 'Kim', 'LS', 2017, 'Nam', '1993-11-12', 'Gia Lai'),
(442017002, 'Phạm Thị', 'Hồng', 'GD', 2017, 'Nữ', '1995-12-08', 'Bình Định'),
(542015001, 'Lê Thu', 'Hương', 'AV', 2015, 'Nam', '1997-12-08', 'Đồng Nai'),
(542016001, 'Hồ Trung', 'Dũng', 'TH', 2016, 'Nam', '1998-12-01', 'Bình Định');

/*
INSERT INTO `hocsinh` (`mahs`, `hotendem`, `ten`, `malop`, `gioitinh`, `nam`, `ngaysinh`, `diachi`) VALUES
(2013410001, 'Hồ Thị Thanh', 'Hà', '12a1', 'Nữ', 2013, '2000-09-16', 'Đông hòa'),
(2013410002, 'Lê Thu ', 'Quỳnh', '12a2', 'Nữ', 2013, '2000-10-05', 'Đông hòa'),
(2013410003, 'Lê Thu ', 'Quỳnh', '11a1', 'Nữ', 2013, '2000-02-26', 'Đông hòa'),
(2013410004, 'Nguyễn Thị Tuyết', 'Trinh', '11a2', 'Nữ', 2013, '2000-09-08', 'Đông hòa'),
(2013410005, 'Trần Xuân', 'Mai', '10a1', 'Nữ', 2013, '2000-06-08', 'Đông hòa'),
(2013410006, 'Lê Mỹ ', 'Linh', '10a2', 'Nữ', 2013, '2000-03-13', 'Đông hòa'),
(2014410001, 'Nguyễn Thanh', 'Thao', '12a1', 'Nam', 2014, '2000-07-19', 'Đông hòa'),
(2014410002, 'Lê Quỳnh ', 'Như', '12a1', 'Nữ', 2014, '2000-05-06', 'Đông hòa'),
(2014410003, 'Hồ Văn', 'Cường', '12a2', 'Nam', 2014, '2000-12-14', 'Đông hòa'),
(2014410004, 'Trần Quốc', 'Bảo', '12a2', 'Nam', 2014, '2000-07-25', 'Đông hòa'),
(2014410005, 'Đoàn Phước ', 'Cường', '11a1', 'Nam', 2014, '2000-02-26', 'Đông hòa'),
(2014410006, 'Phạm Hoàng', 'Sơn', '11a1', 'Nam', 2014, '2000-02-26', 'Đông hòa'),
(2014410007, 'Nguyễn Văn', 'Khoa', '11a2', 'Nam', 2014, '2000-09-08', 'Đông hòa'),
(2014410008, 'Nguyễn Thanh', 'Thuận', '11a2', 'Nam', 2014, '2000-09-08', 'Đông hòa'),
(2014410009, 'Quang Ngọc', 'Trinh', '10a1', 'Nam', 2014, '2000-06-08', 'Đông hòa'),
(2014410010, 'Phan Thành', 'Trung', '10a1', 'Nam', 2014, '2000-06-08', 'Đông hòa'),
(2014410011, 'Văn Thành', 'Nhân', '10a2', 'Nam', 2014, '2000-03-13', 'Đông hòa'),
(2014410012, 'Huỳnh Thu', 'Thủy', '10a2', 'Nữ', 2014, '2000-03-13', 'Đông hòa'),
(2015410001, 'Dương Thành', 'Công', '12a1', 'Nam', 2015, '2000-02-03', 'Đông hòa'),
(2015410002, 'Trần Văn', 'Quang', '12a1', 'Nam', 2015, '2000-01-05', 'Đông hòa'),
(2015410003, 'Trịnh Kim', 'Chi', '12a2', 'Nữ', 2015, '2000-05-23', 'Đông hòa'),
(2015410004, 'Hà Quốc', 'Chung', '12a2', 'Nam', 2015, '2000-08-06', 'Đông hòa'),
(2015410005, 'Trần Quỳnh', 'Giao', '11a1', 'Nữ', 2015, '2000-02-26', 'Đông hòa'),
(2015410006, 'Nguyễn Hải', 'Đăng', '11a1', 'Nam', 2015, '2000-02-26', 'Đông hòa'),
(2015410007, 'Đỗ Thu', 'Lan', '11a2', 'Nữ', 2015, '2000-09-08', 'Đông hòa'),
(2015410008, 'Nguyễn Duy', 'Thuật', '11a2', 'Nam', 2015, '2000-09-08', 'Đông hòa'),
(2015410009, 'Lê Thu ', 'Trang', '10a1', 'Nữ', 2015, '2000-06-08', 'Đông hòa'),
(2015410010, 'Tạ Đình', 'Phong', '10a1', 'Nam', 2015, '2000-06-08', 'Đông hòa'),
(2015410011, 'Trần Thành ', 'Đạt', '10a2', 'Nam', 2015, '2000-03-13', 'Đông hòa'),
(2015410012, 'Quách Ngọc', 'Tuyên', '10a2', 'Nam', 2015, '2000-03-13', 'Đông hòa');


*/


