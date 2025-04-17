-- role
INSERT INTO `reservasi_tour`.`role` (`role`) VALUES
('admin'),
('agent'),
('production'),
('accounting'),
('operation');

-- user
INSERT INTO `reservasi_tour`.`user` (`nama`, `username`, `password`, `email`, `role_id`, `created_at`, `updated_at`) VALUES
('Admin', 'admin', '$2a$12$RuY4SnT9jNOUFWRX8SFbdOCSzoi7HeuRfgcDSL/K0ZW9vS5JVwg9u', 'admin@example.com', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Agent', 'agent', '$2a$12$DZC5aC4KL.ycXQ6WyayuoOn6VVvAbFU.gX8QYJJHMuO/2tRjLTN5C', 'agent@example.com', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Production', 'production', '$2a$12$ovt6q/THNwtCiif4VaqLj.L7WN6yhhEsywH0un8Rwvai0/ipI6Wcy', 'production@example.com', 3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Accounting', 'accounting', '$2a$12$s.ZzMNzTRdjAjcMLFz8BQ.OXWZgB9bjGSiWkKz6pDd6mBHaTsKIHm', 'accounting@example.com', 4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
('Operation', 'operation', '$2a$12$mKwZB9dDd8eLJhdAgRs5buazXWG/bCAn/P3oe2.xHSkEVOyiF6aIq', 'operation@example.com', 5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

-- bahasa
INSERT INTO `reservasi_tour`.`bahasa` (`nama_bahasa`, `harga_bahasa`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('English', 100.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Spanish', 120.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('French', 130.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('German', 110.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Japanese', 140.00, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1);

-- guide
INSERT INTO `reservasi_tour`.`guide` (`guide_name`, `no_telp`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('John Doe', '1234567890', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Jane Smith', '0987654321', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Alice Johnson', '5551234567', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Bob Brown', '5559876543', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Charlie Davis', '5556789012', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1);

-- guide has bahasa
INSERT INTO `reservasi_tour`.`guide_has_bahasa` (`guide_id`, `bahasa_id`) VALUES
(1, 1), -- John Doe speaks English
(1, 2), -- John Doe speaks Spanish
(2, 1), -- Jane Smith speaks English
(3, 3), -- Alice Johnson speaks French
(4, 4), -- Bob Brown speaks German
(5, 5); -- Charlie Davis speaks Japanese

-- kendaraan
INSERT INTO `reservasi_tour`.`kendaraan` (`nomor_kendaraan`, `jenis_kendaraan`, `kapasitas`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('AB123CD', 'Bus', 50, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('EF456GH', 'Minivan', 12, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('IJ789KL', 'SUV', 7, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('MN012OP', 'Sedan', 4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('QR345ST', 'Coach', 40, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1);

-- vendor
INSERT INTO `reservasi_tour`.`vendor` (`nama_vendor`, `contact`, `bank`, `no_rekening`, `account_name`, `validity_period`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('Vendor A', 'vendorA@example.com', 'Bank A', '1234567890', 'Vendor A Account', '2024-12-31', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Vendor B', 'vendorB@example.com', 'Bank B', '0987654321', 'Vendor B Account', '2024-11-30', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Vendor C', 'vendorC@example.com', 'Bank C', '1122334455', 'Vendor C Account', '2024-10-31', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Vendor D', 'vendorD@example.com', 'Bank D', '5566778899', 'Vendor D Account', '2024-09-30', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Vendor E', 'vendorE@example.com', 'Bank E', '6677889900', 'Vendor E Account', '2024-08-31', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1);

-- produk
INSERT INTO `reservasi_tour`.`produk` (`nama_produk`, `harga`, `area`, `deskripsi`, `tipe_produk`, `vendor_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('Luxury Bus Tour', 150.00, 'City Center', 'A luxury bus tour around the city center with various stops at popular tourist attractions.', 'transport', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('5-Star Hotel Stay', 200.00, 'Downtown', 'A stay at a 5-star hotel with all amenities included.', 'hotel', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Fine Dining Experience', 100.00, 'Riverside', 'A fine dining experience at a top-rated restaurant with a river view.', 'restaurant', 3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Museum Tour', 50.00, 'Museum District', 'A guided tour of the citys most famous museums.', 'tourist_attraction', 4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Custom Package', 300.00, 'Various Locations', 'A custom package including transportation, accommodation, and guided tours.', 'etc', 5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1);

-- program
INSERT INTO `reservasi_tour`.`program` (`nama_program`, `deskripsi`, `durasi`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('City Highlights Tour', 'A comprehensive tour covering all the major highlights of the city.', 4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Historical Journey', 'A tour focused on the historical landmarks and stories of the city.', 6, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Cultural Experience', 'An immersive program showcasing the cultural aspects of the city.', 3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Adventure Trip', 'An action-packed program filled with adventure activities.', 5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Relaxation Retreat', 'A program designed for relaxation and rejuvenation.', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1);

-- program has produk
INSERT INTO `reservasi_tour`.`program_has_produk` (`program_id`, `produk_id`) VALUES
(1, 1), -- City Highlights Tour includes Luxury Bus Tour
(2, 4), -- Historical Journey includes Museum Tour
(3, 3), -- Cultural Experience includes Fine Dining Experience
(4, 1), -- Adventure Trip includes Luxury Bus Tour
(5, 2); -- Relaxation Retreat includes 5-Star Hotel Stay


-- sopir
INSERT INTO `reservasi_tour`.`sopir` (`nama_sopir`, `no_telp`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('John Doe', '1234567890', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Jane Smith', '0987654321', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Alice Johnson', '5551234567', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Bob Brown', '5559876543', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1),
('Charlie Davis', '5556789012', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 1, 1);

-- reservasi
INSERT INTO `reservasi_tour`.`reservasi` (
    `dob`, `date`, `program_id`, `pax`, `agent`, `tour_code`, `contact`, `activity`, `hotel`,
    `flight_arrival_code`, `eta`, `flight_departure_code`, `etd`, `pickup`, `guide_id`,
    `transport_id`, `sopir_id`, `remarks`, `bahasa_id`, `created_by`, `updated_by`, `created_at`, `updated_at`,
    `guest_name`
) VALUES
('1990-01-01', '2024-07-01', 1, 2, 'Agent A', 'TOUR001', 'agent@example.com', 'City Highlights Tour', 'Luxury Hotel',
 'FL123', '09:00:00', 'FL456', '18:00:00', '10:00:00', 1, 1, 1, 'No special remarks', 1, 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'John Hammond'),
('1985-05-05', '2024-07-02', 2, 3, 'Agent B', 'TOUR002', 'anotheragent@example.com', 'Historical Journey', 'Boutique Hotel',
 'FL789', '10:30:00', 'FL012', '20:30:00', '11:30:00', 2, 2, 2, 'Please arrange vegetarian meals', 2, 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'John Constantine'),
('1978-12-15', '2024-07-03', 3, 1, 'Agent C', 'TOUR003', 'agentC@example.com', 'Cultural Experience', 'Resort',
 'FL345', '08:45:00', 'FL678', '17:45:00', '09:45:00', 3, 3, 3, 'Guest has mobility issues', 3, 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'John Chena'),
('1982-09-20', '2024-07-04', 4, 4, 'Agent D', 'TOUR004', 'agentD@example.com', 'Adventure Trip', 'Budget Hotel',
 'FL901', '11:15:00', 'FL234', '21:15:00', '12:15:00', 4, 4, 4, 'No specific requirements', 4, 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'John Kepler'),
('1995-03-10', '2024-07-05', 5, 2, 'Agent E', 'TOUR005', 'agentE@example.com', 'Relaxation Retreat', 'Hostel',
 'FL567', '09:30:00', 'FL890', '19:30:00', '10:30:00', 5, 5, 5, 'Early check-in requested', 5, 1, 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'Muhammad Sumbul');

-- tagihan
INSERT INTO `reservasi_tour`.`tagihan` (`total`, `status`, `deskripsi`, `reservasi_id`, `created_at`, `updated_at`) VALUES
(200.00, 'pending', 'Initial payment for the reservation', 1, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(300.00, 'paid', 'Full payment received', 2, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(150.00, 'pending', 'Deposit payment due', 3, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(400.00, 'overdue', 'Payment overdue for the reservation', 4, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP),
(250.00, 'pending', 'Payment for additional services', 5, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

