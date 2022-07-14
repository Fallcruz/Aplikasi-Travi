class TourPackage {
  final String image;
  final String packageName;
  final String travelName;
  final String duration;
  final int price;
  final String email;
  final String phoneNumber;
  final String address;
  final String activity;
  final String description;
  final String service;

  TourPackage(
      {required this.image,
      required this.packageName,
      required this.travelName,
      required this.duration,
      required this.price,
      required this.email,
      required this.phoneNumber,
      required this.address,
      required this.activity,
      required this.description,
      required this.service});

  factory TourPackage.fromJson(Map<String, dynamic> json) {
    return TourPackage(
        image: json['gambar'],
        packageName: json['nama_paket'],
        travelName: json['nama'],
        duration: json['durasi'],
        price: json['harga'],
        email: json['email'],
        phoneNumber: json['nomor_telepon'],
        address: json['alamat'],
        activity: json['kegiatan_wisata'],
        description: json['deskripsi'],
        service: json['pelayanan']);
  }
}
