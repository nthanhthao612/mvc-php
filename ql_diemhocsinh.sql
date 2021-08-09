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
    CONSTRAINT hocsinh_PK PRIMARY KEY (mahs),
    CONSTRAINT check_gioitinh CHECK (gioitinh = 'Nam' OR gioitinh = 'Nữ'),
    CONSTRAINT check_nam CHECK (nam > 2012),
    CONSTRAINT check_ngaysinh CHECK (ngaysinh > '2000-1-1')
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
    diemmieng float(3,1),
    diem15p float(3,1),
    diem1tiet float(3,1),
    diemhk float(3,1),
    diemtb float(3,1),
    CONSTRAINT check_namhoc CHECK (namhoc > 2017),
    CONSTRAINT check_diem15p CHECK (diem15p BETWEEN 0 AND 10),
    CONSTRAINT check_diemmieng CHECK (diemmieng BETWEEN 0 AND 10),
    CONSTRAINT check_diem1tiet CHECK (diem1tiet BETWEEN 0 AND 10),
    CONSTRAINT check_diemhk CHECK (diemhk BETWEEN 0 AND 10),
    CONSTRAINT check_diemtb CHECK (diemtb BETWEEN 0 AND 10)
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
    PRIMARY KEY(magv),
    CONSTRAINT check_gioitinh CHECK (gioitinh = 'Nam' OR gioitinh = 'Nữ'),
    CONSTRAINT check_nam CHECK (namgv > 2010),
    CONSTRAINT check_ngaysinh CHECK (ngaysinh > '1970-1-1')
);
CREATE TABLE taikhoan
(
    tentk VARCHAR(10),
    matkhau VARCHAR(255),
    magv INT(9),
    mahs INT(9),
    quyen VARCHAR(5),
    CONSTRAINT check_quyen CHECK (quyen = 'gv' OR quyen = 'hs' OR quyen = 'admin')
);
CREATE TABLE tongket
(
    mahs INT(10),
    mahk INT(1),
    diemtk float(3,1),
    xeploai VARCHAR(30),
    namhoc INT(4),
    CONSTRAINT check_namhoc CHECK (namhoc > 2017),
    CONSTRAINT check_diemtk CHECK (diemtk BETWEEN 0 AND 10),
    CONSTRAINT check_xeploai CHECK (xeploai = 'Giỏi' OR xeploai = 'Khá' OR xeploai = 'Trung Bình' OR xeploai = 'Chưa xếp loại')
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
(412013001, 'Trương Phúc', 'Hậu', 'VL', 2013, 'Nam', '1990-06-07', 'Phú Yên'),
(412013002, 'Vương Lạc', 'Huy', 'SH', 2013, 'Nam', '1991-05-23', 'Phú Yên'),
(412013003, 'Lê Văn', 'Bình', 'HH', 2013, 'Nam', '1993-06-28', 'Hà Giang'),
(412014001, 'Nguyễn Văn', 'Hậu', 'VL', 2014, 'Nam', '1990-06-05', 'Lâm Đồng'),
(412014002, 'Hà Lê Thúy', 'Quỳnh', 'TO', 2014, 'Nữ', '1998-12-20', 'Phú Yên'),
(412014003, 'Hoàng Xuân', 'Vinh', 'TO', 2014, 'Nam', '1993-01-29', 'Khánh Hòa'),
(412016001, 'Hồ Quỳnh', 'Hương', 'SH', 2016, 'Nữ', '1992-03-19', 'Khánh Hòa'),
(412016002, 'Phạm Thu', 'Huyền', 'HH', 2016, 'Nữ', '1994-08-19', 'Khánh Hòa'),
(412016003, 'Huỳnh Phát', 'Đạt', 'VL', 2016, 'Nam', '1992-12-19', 'Bình Định'),
(412016004, 'Phạm Thái', 'Linh', 'SH', 2016, 'Nam', '1992-05-14', 'Phú Yên'),
(412017001, 'Hà Quốc', 'Cường', 'TO', 2017, 'Nam', '1994-12-05', 'Khánh Hòa'),
(412018001, 'Trần Thanh', 'Hùng', 'HH', 2018, 'Nam', '1994-05-06', 'Phú Yên'),
(442013001, 'Huỳnh Kim ', 'Yên', 'NV', 2013, 'Nữ', '1992-09-17', 'Gia Lai'),
(442014001, 'Phạm Phước', 'Lộc', 'NV', 2014, 'Nam', '1990-02-01', 'Phú Yên'),
(442014002, 'Huỳnh Thanh', 'Tuấn', 'LS', 2014, 'Nam', '1994-11-12', 'Lâm Đồng'),
(442015001, 'Lâm Đình', 'Khoa', 'GD', 2015, 'Nam', '1995-03-18', 'Lâm Đồng'),
(442016001, 'Nguyễn Đỗ Thanh', 'Trà', 'DL', 2016, 'Nữ', '1993-06-17', 'Phú Yên'),
(442016002, 'Lê Kim', 'Oanh', 'DL', 2016, 'Nữ', '1996-01-12', 'Bình Định'),
(442017001, 'Trần Phi', 'Kim', 'LS', 2017, 'Nam', '1993-11-12', 'Gia Lai'),
(442017002, 'Phạm Thị', 'Hồng', 'GD', 2017, 'Nữ', '1995-12-08', 'Bình Định'),
(542015001, 'Lê Thu', 'Hương', 'AV', 2015, 'Nam', '1997-12-08', 'Đồng Nai'),
(542015002, 'Nguyễn Quốc', 'Kiên', 'TH', 2015, 'Nam', '1996-01-13', 'Đà Nẵng'),
(542015003, 'Lê Mỹ', 'Linh', 'AV', 2015, 'Nữ', '1994-02-19', 'Phú Yên'),
(542016001, 'Hồ Trung', 'Dũng', 'TH', 2016, 'Nam', '1998-12-01', 'Bình Định'),
(542017001, 'Lê Minh', 'Đức', 'AV', 2017, 'Nam', '1993-06-23', 'Phú Yên');


INSERT INTO `taikhoan` (`tentk`, `matkhau`, `magv`, `mahs`, `quyen`) VALUES
('412014001', 'c81e728d9d4c2f636f067f89cc14862c', 412014001, NULL, 'gv'),
('412014002', 'c81e728d9d4c2f636f067f89cc14862c', 412014002, NULL, 'gv'),
('412016001', 'c81e728d9d4c2f636f067f89cc14862c', 412016001, NULL, 'gv'),
('412018001', 'c81e728d9d4c2f636f067f89cc14862c', 412018001, NULL, 'gv'),
('442014001', 'c81e728d9d4c2f636f067f89cc14862c', 442014001, NULL, 'gv'),
('442016001', 'c81e728d9d4c2f636f067f89cc14862c', 442016001, NULL, 'gv'),
('442017001', 'c81e728d9d4c2f636f067f89cc14862c', 442017001, NULL, 'gv'),
('442017002', 'c81e728d9d4c2f636f067f89cc14862c', 442017002, NULL, 'gv'),
('542015001', 'c81e728d9d4c2f636f067f89cc14862c', 542015001, NULL, 'gv'),
('542016001', 'c81e728d9d4c2f636f067f89cc14862c', 542016001, NULL, 'gv'),
('412013001', 'c81e728d9d4c2f636f067f89cc14862c', 412013001, NULL, 'gv'),
('442015001', 'c81e728d9d4c2f636f067f89cc14862c', 442015001, NULL, 'gv'),
('412017001', 'c81e728d9d4c2f636f067f89cc14862c', 412017001, NULL, 'gv'),
('442016002', 'c81e728d9d4c2f636f067f89cc14862c', 442016002, NULL, 'gv'),
('442013001', 'c81e728d9d4c2f636f067f89cc14862c', 442013001, NULL, 'gv'),
('542015002', 'c81e728d9d4c2f636f067f89cc14862c', 542015002, NULL, 'gv'),
('442014002', 'c81e728d9d4c2f636f067f89cc14862c', 442014002, NULL, 'gv'),
('542017001', 'c81e728d9d4c2f636f067f89cc14862c', 542017001, NULL, 'gv'),
('412016002', 'c81e728d9d4c2f636f067f89cc14862c', 412016002, NULL, 'gv'),
('412013002', 'c81e728d9d4c2f636f067f89cc14862c', 412013002, NULL, 'gv'),
('542015003', 'c81e728d9d4c2f636f067f89cc14862c', 542015003, NULL, 'gv'),
('412014003', 'c81e728d9d4c2f636f067f89cc14862c', 412014003, NULL, 'gv'),
('412016003', 'c81e728d9d4c2f636f067f89cc14862c', 412016003, NULL, 'gv'),
('412013003', 'c81e728d9d4c2f636f067f89cc14862c', 412013003, NULL, 'gv'),
('412016004', 'c81e728d9d4c2f636f067f89cc14862c', 412016004, NULL, 'gv');

INSERT INTO `lop` (`magv`, `makhoi`, `malop`, `manm`) VALUES
(412013002, '10', '10a1', 'A'),
(412016004, '10', '10a2', 'A'),
(412016001, '11', '11a1', 'A'),
(412014002, '11', '11a2', 'A'),
(442016001, '11', '11d1', 'D'),
(542016001, '12', '12a1', 'A'),
(412016002, '12', '12a2', 'A'),
(442014001, '12', '12d1', 'D');



INSERT INTO `monphutrach` (`magv`, `malop`, `mamh`) VALUES
(542015001, '12a1', 'AV'),
(442016002, '12a1', 'DL'),
(442015001, '12a1', 'GD'),
(412013003, '12a1', 'HH'),
(442014002, '12a1', 'LS'),
(442014001, '12a1', 'NV'),
(412016001, '12a1', 'SH'),
(542016001, '12a1', 'TH'),
(412014003, '12a1', 'TO'),
(412016003, '12a1', 'VL'),
(542017001, '12a2', 'AV'),
(442016001, '12a2', 'DL'),
(442017002, '12a2', 'GD'),
(412016002, '12a2', 'HH'),
(442017001, '12a2', 'LS'),
(442013001, '12a2', 'NV'),
(412013002, '12a2', 'SH'),
(542015002, '12a2', 'TH'),
(412017001, '12a2', 'TO'),
(412014001, '12a2', 'VL'),
(542015001, '11a1', 'AV'),
(442016002, '11a1', 'DL'),
(442015001, '11a1', 'GD'),
(412018001, '11a1', 'HH'),
(442017001, '11a1', 'LS'),
(442014001, '11a1', 'NV'),
(412016001, '11a1', 'SH'),
(542016001, '11a1', 'TH'),
(412014003, '11a1', 'TO'),
(412013001, '11a1', 'VL'),
(542017001, '11a2', 'AV'),
(442016002, '11a2', 'DL'),
(442017002, '11a2', 'GD'),
(412018001, '11a2', 'HH'),
(442014002, '11a2', 'LS'),
(442013001, '11a2', 'NV'),
(412016001, '11a2', 'SH'),
(542015002, '11a2', 'TH'),
(412014002, '11a2', 'TO'),
(412016003, '11a2', 'VL'),
(542015001, '10a1', 'AV'),
(442016001, '10a1', 'DL'),
(442015001, '10a1', 'GD'),
(412016002, '10a1', 'HH'),
(442014002, '10a1', 'LS'),
(442014001, '10a1', 'NV'),
(412013002, '10a1', 'SH'),
(542016001, '10a1', 'TH'),
(412017001, '10a1', 'TO'),
(412014001, '10a1', 'VL'),
(542015001, '10a2', 'AV'),
(442016001, '10a2', 'DL'),
(442017002, '10a2', 'GD'),
(412013003, '10a2', 'HH'),
(442017001, '10a2', 'LS'),
(442013001, '10a2', 'NV'),
(412016004, '10a2', 'SH'),
(542016001, '10a2', 'TH'),
(412014002, '10a2', 'TO'),
(412013001, '10a2', 'VL'),
(542015003, '12d1', 'AV'),
(442016001, '12d1', 'DL'),
(442015001, '12d1', 'GD'),
(412013003, '12d1', 'HH'),
(442017001, '12d1', 'LS'),
(442014001, '12d1', 'NV'),
(412016001, '12d1', 'SH'),
(542015002, '12d1', 'TH'),
(412014003, '12d1', 'TO'),
(412014001, '12d1', 'VL'),
(542015001, '11d1', 'AV'),
(442016001, '11d1', 'DL'),
(442015001, '11d1', 'GD'),
(412018001, '11d1', 'HH'),
(442014002, '11d1', 'LS'),
(442014001, '11d1', 'NV'),
(412013002, '11d1', 'SH'),
(542015002, '11d1', 'TH'),
(412017001, '11d1', 'TO'),
(412014001, '11d1', 'VL');


INSERT INTO `hocsinh` (`mahs`, `hotendem`, `ten`, `malop`, `gioitinh`, `nam`, `ngaysinh`, `diachi`) VALUES
(2013410001, 'Hồ Thị Thanh', 'Hà', '12a1', 'Nữ', 2013, '2000-09-16', 'Đông hòa'),
(2013410002, 'Lê Thu ', 'Quỳnh', '12a2', 'Nữ', 2013, '2000-10-05', 'Đông hòa'),
(2013410003, 'Nguyễn Thị Tuyết', 'Trinh', '11a2', 'Nữ', 2013, '2000-09-08', 'Đông hòa'),
(2013410004, 'Lê Thu ', 'Quỳnh', '11a1', 'Nữ', 2013, '2000-02-26', 'Đông hòa'),
(2013410005, 'Lê Mỹ ', 'Linh', '10a2', 'Nữ', 2013, '2000-03-13', 'Đông hòa'),
(2013410006, 'Trần Xuân', 'Mai', '10a1', 'Nữ', 2013, '2000-06-08', 'Đông hòa'),
(2013440001, 'Huỳnh Phước', 'Danh', '12d1', 'Nữ', 2013, '2000-01-02', 'Đông hòa'),
(2013440002, 'Phạm Hoài', 'Thu', '11d1', 'Nữ', 2013, '2000-10-16', 'Đông hòa'),
(2014410001, 'Nguyễn Thanh', 'Thao', '12a1', 'Nam', 2014, '2000-07-19', 'Đông hòa'),
(2014410002, 'Lê Quỳnh ', 'Như', '12a1', 'Nữ', 2014, '2000-05-06', 'Đông hòa'),
(2014410003, 'Hồ Văn', 'Cường', '12a2', 'Nam', 2014, '2000-12-14', 'Đông hòa'),
(2014410004, 'Trần Quốc', 'Bảo', '12a2', 'Nam', 2014, '2000-07-25', 'Đông hòa'),
(2014410005, 'Nguyễn Văn', 'Khoa', '11a2', 'Nam', 2014, '2000-09-08', 'Đông hòa'),
(2014410006, 'Nguyễn Thanh', 'Thuận', '11a2', 'Nam', 2014, '2000-09-08', 'Đông hòa'),
(2014410007, 'Đoàn Phước ', 'Cường', '11a1', 'Nam', 2014, '2000-02-26', 'Đông hòa'),
(2014410008, 'Phạm Hoàng', 'Sơn', '11a1', 'Nam', 2014, '2000-02-26', 'Đông hòa'),
(2014410009, 'Văn Thành', 'Nhân', '10a2', 'Nam', 2014, '2000-03-13', 'Đông hòa'),
(2014410010, 'Huỳnh Thu', 'Thủy', '10a2', 'Nữ', 2014, '2000-03-13', 'Đông hòa'),
(2014410011, 'Quang Ngọc', 'Trinh', '10a1', 'Nam', 2014, '2000-06-08', 'Đông hòa'),
(2014410012, 'Phan Thành', 'Trung', '10a1', 'Nam', 2014, '2000-06-08', 'Đông hòa'),
(2014440001, 'Ngô Bá', 'Khá', '12d1', 'Nam', 2014, '2000-10-12', 'Đông hòa'),
(2014440002, 'Nguyễn Thanh ', 'Tùng', '12d1', 'Nam', 2014, '2000-08-08', 'Đông hòa'),
(2014440003, 'Lê Bách', 'Hào', '11d1', 'Nam', 2014, '2000-10-16', 'Đông hòa'),
(2014440004, 'Phùng Thanh', 'Độ', '11d1', 'Nam', 2014, '2000-10-16', 'Đông hòa'),
(2015410001, 'Dương Thành', 'Công', '12a1', 'Nam', 2015, '2000-02-03', 'Đông hòa'),
(2015410002, 'Trần Văn', 'Quang', '12a1', 'Nam', 2015, '2000-01-05', 'Đông hòa'),
(2015410003, 'Trịnh Kim', 'Chi', '12a2', 'Nữ', 2015, '2000-05-23', 'Đông hòa'),
(2015410004, 'Hà Quốc', 'Chung', '12a2', 'Nam', 2015, '2000-08-06', 'Đông hòa'),
(2015410005, 'Đỗ Thu', 'Lan', '11a2', 'Nữ', 2015, '2000-09-08', 'Đông hòa'),
(2015410006, 'Nguyễn Duy', 'Thuật', '11a2', 'Nam', 2015, '2000-09-08', 'Đông hòa'),
(2015410007, 'Trần Quỳnh', 'Giao', '11a1', 'Nữ', 2015, '2000-02-26', 'Đông hòa'),
(2015410008, 'Nguyễn Hải', 'Đăng', '11a1', 'Nam', 2015, '2000-02-26', 'Đông hòa'),
(2015410009, 'Trần Thành ', 'Đạt', '10a2', 'Nam', 2015, '2000-03-13', 'Đông hòa'),
(2015410010, 'Quách Ngọc', 'Tuyên', '10a2', 'Nam', 2015, '2000-03-13', 'Đông hòa'),
(2015410011, 'Lê Thu ', 'Trang', '10a1', 'Nữ', 2015, '2000-06-08', 'Đông hòa'),
(2015410012, 'Tạ Đình', 'Phong', '10a1', 'Nam', 2015, '2000-06-08', 'Đông hòa'),
(2015440001, 'Đặng Thu ', 'Hà', '12d1', 'Nữ', 2015, '2000-12-24', 'Đông hòa'),
(2015440002, 'Đậu Thu', 'Uyên', '12d1', 'Nam', 2015, '2000-12-16', 'Đông hòa'),
(2015440003, 'Trịnh Kim', 'Liên', '11d1', 'Nữ', 2015, '2000-10-12', 'Đông hòa'),
(2015440004, 'Lê Duy', 'Thành', '11d1', 'Nam', 2015, '2000-10-16', 'Đông hòa');


INSERT INTO `taikhoan` (`tentk`, `matkhau`, `magv`, `mahs`, `quyen`) VALUES
('2014410001', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410001, 'hs'),
('2015410001', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410001, 'hs'),
('2014410002', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410002, 'hs'),
('2015410002', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410002, 'hs'),
('2013410001', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2013410001, 'hs'),
('2014410003', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410003, 'hs'),
('2015410003', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410003, 'hs'),
('2014410004', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410004, 'hs'),
('2015410004', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410004, 'hs'),
('2013410002', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2013410002, 'hs'),
('2014440001', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014440001, 'hs'),
('2015440001', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015440001, 'hs'),
('2014440002', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014440002, 'hs'),
('2015440002', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015440002, 'hs'),
('2013440001', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2013440001, 'hs'),
('2014440003', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014440003, 'hs'),
('2015440003', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015440003, 'hs'),
('2014440004', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014440004, 'hs'),
('2015440004', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015440004, 'hs'),
('2013440002', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2013440002, 'hs'),
('2014410005', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410005, 'hs'),
('2015410005', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410005, 'hs'),
('2014410006', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410006, 'hs'),
('2015410006', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410006, 'hs'),
('2013410003', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2013410003, 'hs'),
('2014410007', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410007, 'hs'),
('2015410007', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410007, 'hs'),
('2014410008', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410008, 'hs'),
('2015410008', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410008, 'hs'),
('2013410004', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2013410004, 'hs'),
('2014410009', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410009, 'hs'),
('2015410009', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410009, 'hs'),
('2014410010', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410010, 'hs'),
('2015410010', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410010, 'hs'),
('2013410005', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2013410005, 'hs'),
('2014410011', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410011, 'hs'),
('2015410011', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410011, 'hs'),
('2014410012', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2014410012, 'hs'),
('2015410012', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2015410012, 'hs'),
('2013410006', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 2013410006, 'hs');



