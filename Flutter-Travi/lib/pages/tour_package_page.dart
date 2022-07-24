import 'package:flutter/material.dart';
import 'package:travi_app/tour_package.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:intl/intl.dart';
import 'package:flutter_dotenv/flutter_dotenv.dart';

Card cardWidget({
  image,
  packageName,
  travelName,
  duration,
  price,
  email,
  phoneNumber,
  address,
  activity,
  description,
  service,
  context}) {
  NumberFormat currencyFormatter = NumberFormat.currency(
    locale: 'id',
    symbol: 'Rp ',
    decimalDigits: 0,
  );
  return Card(
    elevation: 3,
    shadowColor: Colors.grey,
    clipBehavior: Clip.antiAlias,
    child: InkWell(
      onTap: () {
        Navigator.pushNamed(context, '/tour-package/detail',
          arguments: TourPackage(
            image: image,
            packageName: packageName,
            travelName: travelName,
            duration: duration,
            price: price,
            email: email,
            phoneNumber: phoneNumber,
            address: address,
            activity: activity,
            description: description,
            service: service
          )
        );
      },
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Image.network(
            image,
            fit: BoxFit.cover,
            width: double.infinity,
            height: 90,
          ),
          Container(
            margin: const EdgeInsets.only(top: 5, left: 8),
            child: Text(
              packageName,
              style: const TextStyle(
                  color: Colors.black87,
                  fontFamily: 'Poppins',
                  fontWeight: FontWeight.w500),
              maxLines: 2,
              overflow: TextOverflow.ellipsis,
            ),
          ),
          Container(
            margin: const EdgeInsets.only(top: 4, left: 8),
            child: Text(
              travelName,
              style: const TextStyle(
                  fontFamily: 'Poppins', fontSize: 13, color: Colors.grey),
              overflow: TextOverflow.ellipsis,
            ),
          ),
          Container(
            margin: const EdgeInsets.only(top: 4, left: 8),
            child: Text(duration,
                style: const TextStyle(
                    fontFamily: 'Poppins', fontSize: 13, color: Colors.grey),
                overflow: TextOverflow.ellipsis),
          ),
          Container(
            margin: const EdgeInsets.only(top: 4, left: 8),
            child: Text(currencyFormatter.format(price).toString(),
                style: const TextStyle(
                    fontWeight: FontWeight.bold,
                    fontFamily: 'Poppins',
                    fontSize: 13),
                overflow: TextOverflow.ellipsis),
          ),
        ],
      ),
    ),
  );
}

var url = dotenv.env['URL'];

Future<List<TourPackage>> fetchTourPackages() async {
  final response = await http.get(Uri.parse("$url/api/tour-package"));

  List<dynamic> body = jsonDecode(response.body);
  List<TourPackage> tourPackages =
      body.map((dynamic item) => TourPackage.fromJson(item)).toList();
  return tourPackages;
}

class TourPackagePage extends StatefulWidget {
  const TourPackagePage({Key? key}) : super(key: key);

  @override
  State<TourPackagePage> createState() => _TourPackagePageState();
}

class _TourPackagePageState extends State<TourPackagePage> {
  late Future<List<TourPackage>> futureTourPackages;
  @override
  void initState() {
    super.initState();
    futureTourPackages = fetchTourPackages();
  }

  var images = [
    'assets/images/kintamani.jpg',
    'assets/images/bedugul.jpg',
  ];

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.white,
        title: const Center(
          child: Text(
            'Tour Package',
            style: TextStyle(
                color: Colors.green,
                fontSize: 20,
                fontFamily: 'Poppins',
                fontWeight: FontWeight.bold),
          ),
        ),
      ),
      body: Column(
        children: [
          Center(
            child: Column(
              children: [
                Container(
                  margin: const EdgeInsets.only(top: 15, bottom: 10),
                  child: const Text(
                    'Temukan paket tour impian mu disini...',
                    textAlign: TextAlign.center,
                    style: TextStyle(
                        fontSize: 14.8,
                        fontFamily: 'Poppins',
                        color: Colors.black),
                  ),
                ),
              ],
            ),
          ),
          Expanded(
              child: FutureBuilder<List<TourPackage>>(
            future: futureTourPackages,
            builder: (context, snapshot) {
              if (snapshot.data != null) {
                return GridView.builder(
                  primary: false,
                  padding: const EdgeInsets.all(10),
                  gridDelegate: const SliverGridDelegateWithFixedCrossAxisCount(
                    crossAxisCount: 2,
                    crossAxisSpacing: 10,
                    mainAxisSpacing: 10,
                    mainAxisExtent: 225, // here set custom Height You Want
                  ),
                  itemCount: snapshot.data!.length,
                  itemBuilder: (BuildContext context, int index) {
                    return cardWidget(
                        image: 
                            '$url/Gambar/Tour%20Package/' +
                            snapshot.data![index].image,
                        packageName: snapshot.data![index].packageName,
                        travelName: snapshot.data![index].travelName,
                        duration: snapshot.data![index].duration,
                        price: snapshot.data![index].price,
                        email: snapshot.data![index].email,
                        phoneNumber: snapshot.data![index].phoneNumber,
                        address: snapshot.data![index].address,
                        activity: snapshot.data![index].activity,
                        description: snapshot.data![index].description,
                        service: snapshot.data![index].service,
                        context: context);
                  },
                );
              } else {
                return const Center(child: CircularProgressIndicator());
              }
            },
          ))
        ],
      ),
    );
  }
}
