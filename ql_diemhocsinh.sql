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
    malop VARCHAR(10)
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
(412013001, 'Châu Việt', 'Linh', 'HH', 2013, 'Nữ', STR_TO_DATE("03-04-1990","%d-%m-%y"), '172 '),
(412013002, 'Tạ Thị Bích', 'Loan', 'SH', 2013, 'Nữ', STR_TO_DATE("05-05-1987","%d-%m-%y"), '9'),
(412014001, 'Nguyễn Văn', 'Hậu', 'VL', 2014, 'Nam', STR_TO_DATE("03-07-1970","%d-%m-%y"), '172 '),
(412015001, 'Phan Đình', 'Phùng', 'TO', 2015, 'Nam', STR_TO_DATE("03-04-1995","%d-%m-%y"), '8'),
(442014001, 'Lê Phi', 'Hằng', 'NV', 2014, 'Nữ', STR_TO_DATE("03-04-1992","%d-%m-%y"), '7'),
(442015001, 'Trần Thu', 'Tâm', 'DL', 2015, '8', STR_TO_DATE("03-04-1985","%d-%m-%y"), '8'),
(442015002, 'Trần Quốc', 'Tuấn', 'LS', 2015, '8', STR_TO_DATE("03-04-1987","%d-%m-%y"), '8'),
(442016001, 'Hà Thị', 'Hiền', 'GD', 2016, 'Nữ', STR_TO_DATE("03-04-1986","%d-%m-%y"), '8'),
(542012001, 'Tô Gia', 'Bảo', 'TH', 2012, 'Nữ', STR_TO_DATE("03-04-1991","%d-%m-%y"), '8'),
(542012002, 'Trương Phúc', 'Hậu', 'AV', 2012, 'Nam', STR_TO_DATE("03-04-1959","%d-%m-%y"), 's');

INSERT INTO `taikhoan` (`tentk`, `matkhau`, `magv`,`quyen`) VALUES
('412014001', '2', 412014001,'gv'),
('442014001', '2', 442014001,'gv'),
('542012001', '2', 542012001,'gv'),
('542012002', '2', 542012002,'gv'),
('412015001', '2', 412015001,'gv'),
('442015001', '2', 442015001,'gv'),
('442015002', '2', 442015002,'gv'),
('412013001', '2', 412013001,'gv'),
('412013002', '2', 412013002,'gv'),
('admin', '2', 412014001,'admin'),
('442016001', '2', 442016001,'gv');


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




INSERT INTO `monphutrach` (`magv`, `malop`) VALUES
(412013001, '12a1'),
(412014001, '12a1'),
(412013002, '12a1'),
(412015001, '12a1'),
(442014001, '12a1'),
(442015001, '12a1'),
(442015002, '12a1'),
(442016001, '12a1'),
(542012001, '12a1'),
(542012002, '12a1');


-- INSERT INTO `monphutrach` (`magv`, `malop`) VALUES
-- (412013001, '12a2'),
-- (412014001, '12a2'),
-- (412013002, '12a2'),
-- (412015001, '12a2'),
-- (442014001, '12a2'),
-- (442015001, '12a2'),
-- (442015002, '12a2'),
-- (442016001, '12a2'),
-- (542012001, '12a2'),
-- (542012002, '12a2');


-- INSERT INTO `monphutrach` (`magv`, `malop`) VALUES
-- (412013001, '12d1'),
-- (412014001, '12d1'),
-- (412013002, '12d1'),
-- (412015001, '12d1'),
-- (442014001, '12d1'),
-- (442015001, '12d1'),
-- (442015002, '12d1'),
-- (442016001, '12d1'),
-- (542012001, '12d1'),
-- (542012002, '12d1');
