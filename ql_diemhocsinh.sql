CREATE DATABASE ql_diemhocsinh CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE hocsinh
(
    
    mahs INT(10),
    malop VARCHAR(10),
    hotendem VARCHAR(255),
    ten VARCHAR(255),
    gioitinh VARCHAR(3),
    nam INT(4),
    ngaysinh VARCHAR(15),
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
    mamh VARCHAR(10),
    mahs INT(10),
    mahk INT(1),
    magv INT(9),
    diemmieng float(2,1),
    diem15p float(2,1),
    diem1tiet float(2,1),
    diemhk float(2,1),
    diemtb float(2,1)
);
CREATE TABLE monhoc
(
    mamh VARCHAR(10),
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
    magv INT(9) AUTO_INCREMENT,
    hotendemgv VARCHAR(255),
    tengv VARCHAR(255),
    mamh VARCHAR(10),
    namgv INT,
    gioitinh VARCHAR(3),
    ngaysinh VARCHAR(15),
    diachi VARCHAR(255),
    PRIMARY KEY(magv)
);
CREATE TABLE taikhoan
(
    tentk VARCHAR(9),
    matkhau VARCHAR(255),
    magv INT(9)
);
CREATE TABLE tongket
(
    mahs INT(10),
    mahk INT(1),
    diemtk float(2,1),
    xeploai VARCHAR(30)
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
(412013001, 'Châu Việt', 'Linh', 'HH', 2013, 'Nữ', '2', '172 '),
(412013002, 'Tạ Thị Bích', 'Loan', 'SH', 2013, 'Nữ', '8', '9'),
(412014001, 'Nguyễn Văn', 'Hậu', 'VL', 2014, 'Nam', '17/12/2015', '172 '),
(412015001, 'Phan Đình', 'Phùng', 'TO', 2015, 'Nam', '8', '8'),
(442014001, 'Lê Phi', 'Hằng', 'NV', 2014, 'Nữ', '8', '7'),
(442015001, 'Trần Thu', 'Tâm', 'DL', 2015, '8', '8', '8'),
(442015002, 'Trần Quốc', 'Tuấn', 'LS', 2015, '8', '8', '8'),
(442016001, 'Hà Thị', 'Hiền', 'GD', 2016, 'Nữ', '8', '8'),
(542012001, 'Tô Gia', 'Bảo', 'TH', 2012, 'Nữ', '9', '8'),
(542012002, 'Trương Phúc', 'Hậu', 'AV', 2012, 'Nam', '9', 's');

INSERT INTO `taikhoan` (`tentk`, `matkhau`, `magv`) VALUES
('412014001', '2', 412014001),
('442014001', '2', 442014001),
('542012001', '2', 542012001),
('542012002', '2', 542012002),
('412015001', '2', 412015001),
('442015001', '2', 442015001),
('442015002', '2', 442015002),
('412013001', '2', 412013001),
('412013002', '2', 412013002),
('442016001', '2', 442016001);


INSERT INTO `lop` (`magv`, `makhoi`, `malop`, `manm`) VALUES
(442015002, '10', '10a1', 'A'),
(412013001, '10', '10a2', 'A'),
(412013002, '10', '10d1', 'D'),
(542012002, '11', '11a1', 'A'),
(412015001, '11', '11a2', 'A'),
(442015001, '11', '11d1', 'D'),
(412014001, '12', '12a1', 'A'),
(442014001, '12', '12a2', 'A'),
(542012001, '12', '12d1', 'D');

INSERT INTO `hocsinh` (`mahs`, `malop`, `hotendem`, `ten`, `gioitinh`, `nam`, `ngaysinh`, `diachi`) VALUES
(2013540001, '12a2', 'Lê Thu ', 'Quỳnh', 'Nữ', 2013, '17/10/2000', 'Đông hòa'),
(2014540001, '12a1', 'Hà Chí ', 'Bảo', 'Nam', 2014, '8', '9'),
(2014540002, '12a1', 'Ngô Công', 'Quyền', 'Nam', 2014, '8', '9'),
(2014540003, '12a2', 'Hồ Văn', 'Cường', 'Nam', 2014, '17/10/2000', 'Đông hòa'),
(2014540004, '12a2', 'Trần Quốc', 'Bảo', 'Nam', 2014, '17/10/2000', 'Đông hòa'),
(2015540001, '12a1', 'Trương Thị Quỳnh', 'Như', 'Nữ', 2015, '1', '2'),
(2015540002, '12a1', 'Nguyễn Thanh', 'Thao', 'Nam', 2015, '8', '9'),
(2015540003, '12a2', 'Trịnh Kim', 'Chi', 'Nữ', 2015, '27/12/2000', 'Đông hòa'),
(2015540004, '12a2', 'Hà Quốc', 'Chung', 'Nam', 2015, '27/12/2000', 'Đông hòa');


INSERT INTO `bangdiem` (`mamh`, `mahs`, `mahk`, `magv`, `diemmieng`, `diem15p`, `diem1tiet`, `diemhk`, `diemtb`) VALUES
('TO', 2014540001, 1, 412015001, 0.0, 0.0, 2.0, 6.0, 3.1),
('TO', 2014540002, 1, 412015001, 5.0, 9.9, 5.0, 9.0, 7.4),
('TO', 2015540001, 1, 412015001, 8.0, 3.0, 2.0, 5.0, 4.3),
('TO', 2015540002, 1, 412015001, 9.9, 0.0, 7.0, 2.0, 4.3),
('VL', 2014540001, 1, 412014001, 2.0, 0.0, 9.9, 5.0, 5.3),
('VL', 2014540002, 1, 412014001, 4.0, 7.0, 9.9, 6.0, 7.0),
('VL', 2015540001, 1, 412014001, 1.0, 4.0, 8.0, 0.0, 3.0),
('VL', 2015540002, 1, 412014001, 4.0, 6.0, 2.0, 8.0, 5.4),
('TH', 2014540001, 1, 542012001, 9.9, 1.0, 9.9, 9.0, 8.2),
('TH', 2014540002, 1, 542012001, 4.0, 2.0, 3.0, 4.0, 3.4),
('TH', 2015540001, 1, 542012001, 9.0, 9.0, 9.9, 8.0, 8.8),
('TH', 2015540002, 1, 542012001, 6.0, 9.0, 9.9, 5.0, 7.1),
('SH', 2014540001, 1, 412013002, 2.0, 5.0, 8.0, 9.0, 7.1),
('SH', 2014540002, 1, 412013002, 7.0, 4.0, 1.0, 7.0, 4.9),
('SH', 2015540001, 1, 412013002, 9.0, 9.9, 2.0, 6.0, 5.8),
('SH', 2015540002, 1, 412013002, 6.0, 0.0, 5.0, 0.0, 2.3),
('NV', 2014540001, 1, 442014001, 3.0, 1.0, 4.0, 9.0, 5.6),
('NV', 2014540002, 1, 412015001, 5.0, 8.0, 9.0, 7.0, 7.4),
('NV', 2015540001, 1, 412015001, 5.0, 7.0, 4.0, 9.0, 6.7),
('NV', 2015540002, 1, 412015001, 8.0, 5.0, 6.0, 3.0, 4.9),
('LS', 2014540001, 1, 442015002, 3.0, 9.9, 5.0, 5.0, 5.4),
('LS', 2014540002, 1, 442015002, 3.0, 5.0, 9.0, 5.0, 5.9),
('LS', 2015540001, 1, 442015002, 8.0, 3.0, 2.0, 1.0, 2.6),
('LS', 2015540002, 1, 442015002, 4.0, 6.0, 2.0, 5.0, 4.1),
('HH', 2014540001, 1, 412013001, 4.0, 9.9, 9.0, 6.0, 7.1),
('HH', 2014540002, 1, 412015001, 5.0, 2.0, 6.0, 6.0, 5.3),
('HH', 2015540001, 1, 412015001, 2.0, 1.0, 3.0, 0.0, 1.3),
('HH', 2015540002, 1, 412015001, 5.0, 1.0, 8.0, 6.0, 5.7),
('GD', 2014540001, 1, 442016001, 7.0, 5.0, 0.0, 6.0, 4.3),
('GD', 2014540002, 1, 442016001, 9.9, 0.0, 4.0, 2.0, 3.4),
('GD', 2015540001, 1, 442016001, 8.0, 9.0, 1.0, 8.0, 6.1),
('GD', 2015540002, 1, 442016001, 8.0, 8.0, 9.0, 6.0, 7.4),
('DL', 2014540001, 1, 442015001, 1.0, 0.0, 6.0, 8.0, 5.3),
('DL', 2014540002, 1, 442015001, 0.0, 5.0, 6.0, 0.0, 2.4),
('DL', 2015540001, 1, 442015001, 0.0, 7.0, 4.0, 7.0, 5.1),
('DL', 2015540002, 1, 442015001, 1.0, 5.0, 8.0, 5.0, 5.3),
('AV', 2014540001, 1, 542012002, 0.0, 1.0, 8.0, 8.0, 5.9),
('AV', 2014540002, 1, 542012002, 1.0, 9.0, 8.0, 9.9, 8.0),
('AV', 2015540001, 1, 542012002, 3.0, 5.0, 8.0, 9.0, 7.3),
('AV', 2015540002, 1, 542012002, 9.0, 2.0, 4.0, 4.0, 4.4);



INSERT INTO `tongket` (`mahs`, `mahk`, `diemtk`, `xeploai`) VALUES
(2014540001, 1, 5.7, 'Trung Bình'),
(2014540002, 1, 5.5, 'Trung Bình'),
(2015540001, 1, 5.1, 'Trung Bình'),
(2015540002, 1, 5.1, 'Trung Bình');
