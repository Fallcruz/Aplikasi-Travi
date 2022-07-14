import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:flutter_dotenv/flutter_dotenv.dart';
import 'package:http/http.dart' as http;
import 'package:flutter_html/flutter_html.dart';

class Destination {
  final int id;
  final String judul;
  final String lokasi;
  final String deskripsi;
  final String excerpt;
  final String gambar;
  final String slug;
  final String created_at;
  final String updated_at;

  Destination({
    required this.id,
    required this.judul,
    required this.lokasi,
    required this.deskripsi,
    required this.excerpt,
    required this.gambar,
    required this.slug,
    required this.created_at,
    required this.updated_at,
  });
}

class DestinationPage extends StatefulWidget {
  const DestinationPage({Key? key}) : super(key: key);

  @override
  State<DestinationPage> createState() => _DestinationPageState();
}

class _DestinationPageState extends State<DestinationPage> {
  Future<List<Destination>> getRequest() async {
    String url = "${dotenv.env['URL']}/api/destination";
    final response = await http.get(Uri.parse(url));

    var responseData = json.decode(response.body);

    List<Destination> destinations = [];
    for (var data in responseData) {
      Destination destination = Destination(
          id: data["id"],
          judul: data["judul"],
          lokasi: data["lokasi"],
          deskripsi: data["deskripsi"],
          excerpt: data["excerpt"],
          gambar: data["gambar"],
          slug: data["slug"],
          created_at: data["created_at"],
          updated_at: data["updated_at"]);

      destinations.add(destination);
    }
    return destinations;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          backgroundColor: Colors.white,
          title: const Center(
            child: Text(
              'Destination',
              style: TextStyle(
                  color: Colors.green,
                  fontSize: 20,
                  fontFamily: 'Poppins',
                  fontWeight: FontWeight.bold),
            ),
          ),
        ),
        body: SafeArea(
            child: FutureBuilder(
                future: getRequest(),
                builder: (BuildContext context, AsyncSnapshot snapshot) {
                  if (snapshot.data == null) {
                    return const Center(
                      child: CircularProgressIndicator(),
                    );
                  } else {
                    return ListView.builder(
                      itemCount: snapshot.data.length,
                      itemBuilder: (context, index) {
                        return GestureDetector(
                          onTap: () {
                            Navigator.pushNamed(context, '/destination/detail',
                                arguments: Destination(
                                  id: snapshot.data[index].id,
                                  judul: snapshot.data[index].judul,
                                  lokasi: snapshot.data[index].lokasi,
                                  deskripsi: snapshot.data[index].deskripsi,
                                  excerpt: snapshot.data[index].excerpt,
                                  gambar:
                                      '${dotenv.env['URL']}/Gambar/destinations/' +
                                          snapshot.data[index].gambar,
                                  slug: snapshot.data[index].slug,
                                  created_at: snapshot.data[index].created_at,
                                  updated_at: snapshot.data[index].updated_at,
                                ));
                          },
                          child: Container(
                            padding: const EdgeInsets.only(bottom: 15),
                            child: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                Image.network(
                                  '${dotenv.env['URL']}/Gambar/destinations/' +
                                      snapshot.data[index].gambar,
                                  width: MediaQuery.of(context).size.width,
                                  height: 250,
                                  fit: BoxFit.cover,
                                ),
                                Padding(
                                  padding: const EdgeInsets.all(15),
                                  child: Column(
                                    crossAxisAlignment:
                                        CrossAxisAlignment.start,
                                    children: [
                                      Text(
                                        snapshot.data[index].judul,
                                        style: const TextStyle(
                                            fontFamily: 'Poppins',
                                            fontWeight: FontWeight.w600,
                                            fontSize: 16,
                                            letterSpacing: 0.6),
                                      ),
                                      const SizedBox(height: 12),
                                      Text.rich(TextSpan(
                                          style: const TextStyle(
                                              fontFamily: 'Poppins',
                                              fontWeight: FontWeight.w300,
                                              fontSize: 13,
                                              letterSpacing: 0.4),
                                          children: [
                                            const TextSpan(
                                                text: 'Lokasi : ',
                                                style: TextStyle(
                                                    fontWeight:
                                                        FontWeight.bold)),
                                            TextSpan(
                                                text: snapshot
                                                    .data[index].lokasi),
                                          ])),
                                      Text.rich(TextSpan(
                                          style: const TextStyle(
                                              fontFamily: 'Poppins',
                                              fontWeight: FontWeight.w300,
                                              fontSize: 13,
                                              letterSpacing: 0.4),
                                          children: [
                                            const TextSpan(
                                                text: 'Dibuat Pada : ',
                                                style: TextStyle(
                                                    fontWeight:
                                                        FontWeight.bold)),
                                            TextSpan(
                                                text: snapshot
                                                    .data[index].created_at
                                                    .split('T')[0]),
                                          ])),
                                      const SizedBox(height: 8),
                                      Text(
                                        snapshot.data[index].excerpt,
                                        style: const TextStyle(
                                            fontFamily: 'Poppins',
                                            fontWeight: FontWeight.w300,
                                            fontSize: 13,
                                            letterSpacing: 0.4),
                                      )
                                    ],
                                  ),
                                )
                              ],
                            ),
                          ),
                        );
                      },
                    );
                  }
                })));
  }
}

class DetailDestination extends StatefulWidget {
  const DetailDestination({Key? key}) : super(key: key);

  @override
  State<DetailDestination> createState() => _DetailDestinationState();
}

class _DetailDestinationState extends State<DetailDestination> {
  @override
  Widget build(BuildContext context) {
    final arguments = ModalRoute.of(context)!.settings.arguments as Destination;
    return Scaffold(
      appBar: AppBar(
        iconTheme: const IconThemeData(color: Colors.black),
        backgroundColor: Colors.white,
        title: const Text(
          'Destination',
          style: TextStyle(
              color: Colors.green,
              fontSize: 20,
              fontFamily: 'Poppins',
              fontWeight: FontWeight.bold),
        ),
        centerTitle: true,
      ),
      body: ListView(
        children: [
          Column(
            children: [
              Image.network(
                arguments.gambar,
                width: MediaQuery.of(context).size.width,
                height: 250,
                fit: BoxFit.cover,
              ),
              Padding(
                padding: const EdgeInsets.all(15),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      arguments.judul,
                      style: const TextStyle(
                          fontFamily: 'Poppins',
                          fontWeight: FontWeight.w600,
                          fontSize: 16,
                          letterSpacing: 0.6),
                    ),
                    const SizedBox(height: 12),
                    Text.rich(TextSpan(
                        style: const TextStyle(
                            fontFamily: 'Poppins',
                            fontWeight: FontWeight.w300,
                            fontSize: 13,
                            letterSpacing: 0.4),
                        children: [
                          const TextSpan(
                              text: 'Lokasi : ',
                              style: TextStyle(fontWeight: FontWeight.bold)),
                          TextSpan(text: arguments.lokasi),
                        ])),
                    Text.rich(TextSpan(
                        style: const TextStyle(
                            fontFamily: 'Poppins',
                            fontWeight: FontWeight.w300,
                            fontSize: 13,
                            letterSpacing: 0.4),
                        children: [
                          const TextSpan(
                              text: 'Dibuat Pada : ',
                              style: TextStyle(fontWeight: FontWeight.bold)),
                          TextSpan(text: arguments.created_at.split('T')[0]),
                        ])),
                    const SizedBox(height: 12),
                    Html(
                      data: arguments.deskripsi,
                      defaultTextStyle: const TextStyle(
                          fontFamily: 'Poppins',
                          fontWeight: FontWeight.w300,
                          fontSize: 13,
                          letterSpacing: 0.4),
                    ),
                  ],
                ),
              )
            ],
          )
        ],
      ),
    );
  }
}
