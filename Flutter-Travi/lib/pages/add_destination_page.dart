import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flutter/src/foundation/key.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:flutter_dotenv/flutter_dotenv.dart';
import 'package:image_picker/image_picker.dart';
import 'package:dio/dio.dart';
import 'package:travi_app/pages/admin_page.dart';

import 'dart:convert';
import 'dart:developer';
import 'dart:io';

class AddDestinationPage extends StatefulWidget {
  const AddDestinationPage({Key? key}) : super(key: key);

  @override
  State<AddDestinationPage> createState() => _AddDestinationPageState();
}

class _AddDestinationPageState extends State<AddDestinationPage> {
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();
  final judulController = TextEditingController();
  final lokasiController = TextEditingController();
  final deskripsiController = TextEditingController();

  File? uploadedImage;

  Future<void> chooseImage() async {
    var choosedImage = await ImagePicker.pickImage(source: ImageSource.gallery);
    setState(() {
      uploadedImage = choosedImage;
    });
  }

  @override
  void initState() {
    super.initState();
    uploadedImage = null;
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        appBar: AppBar(
          leading: IconButton(
            onPressed: (() {
              Navigator.pop(context);
            }),
            icon: const Icon(Icons.arrow_back)
          ),
          backgroundColor: Colors.white,
          iconTheme: const IconThemeData(color: Colors.black),
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
        body: SingleChildScrollView(
          child: Container(
            margin: const EdgeInsets.all(20),
            child: Form(
                key: _formKey,
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Center(
                      child: Container(
                        margin: const EdgeInsets.only(top: 6),
                        child: const Text(
                          'New Destination',
                          textAlign: TextAlign.center,
                          style: TextStyle(
                              fontSize: 20,
                              fontWeight: FontWeight.bold,
                              fontFamily: 'Poppins',
                              color: Colors.black),
                        ),
                      ),
                    ),
                    const SizedBox(
                      height: 12,
                    ),
                    TextFormField(
                      controller: judulController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Judul tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'Judul',
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
                          contentPadding: EdgeInsets.all(5),
                          errorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
                          enabledBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.green)),
                          focusedBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.green))),
                    ),
                    const SizedBox(
                      height: 8,
                    ),
                    TextFormField(
                      controller: lokasiController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Lokasi tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'Lokasi',
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
                          contentPadding: EdgeInsets.all(5),
                          errorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
                          enabledBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.green)),
                          focusedBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.green))),
                    ),
                    const SizedBox(
                      height: 8,
                    ),
                    TextFormField(
                      maxLines: 4,
                      controller: deskripsiController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Deskripsi tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'Deskripsi',
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
                          contentPadding: EdgeInsets.all(5),
                          errorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
                          enabledBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.green)),
                          focusedBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.green))),
                    ),
                    const SizedBox(
                      height: 8,
                    ),
                    Center(
                      child: Container(
                          //show image here after choosing image
                          child: uploadedImage == null
                              ? Container()
                              : //if uploadimage is null then show empty container
                              Container(
                                  //elese show image here
                                  child: SizedBox(
                                      width: MediaQuery.of(context).size.width,
                                      child: Image.file(
                                          uploadedImage!) //load image from file
                                      ))),
                    ),
                    ElevatedButton.icon(
                      onPressed: () {
                        chooseImage();
                      },
                      label: const Text(
                        'Pilih Gambar...',
                        style: TextStyle(color: Colors.white),
                      ),
                      icon: const Icon(Icons.folder_open),
                      style: ElevatedButton.styleFrom(
                        minimumSize: const Size.fromHeight(38),
                      ),
                    ),
                    const SizedBox(
                      height: 10,
                    ),
                    Center(
                      child: ElevatedButton(
                          style: ElevatedButton.styleFrom(
                              minimumSize: const Size.fromHeight(38),
                              primary: Colors.green,
                              padding: const EdgeInsets.all(10)),
                          onPressed: () async {
                            if (_formKey.currentState!.validate()) {
                              var url =
                                  '${dotenv.env['URL']}/api/admin/destination';

                              String fileName =
                                  uploadedImage!.path.split('/').last;
                              var map = new Map<String, dynamic>();
                              map['judul'] = judulController.text;
                              map['lokasi'] = lokasiController.text;
                              map['deskripsi'] = deskripsiController.text;
                              map['gambar'] = await MultipartFile.fromFile(
                                  uploadedImage!.path,
                                  filename: fileName);

                              FormData formData = FormData.fromMap(map);

                              showDialog(
                                  context: context,
                                  builder: (ctx) {
                                    return AlertDialog(
                                      content: const Text(
                                          "Sukses Menambahkan Destination"),
                                      actions: [
                                        TextButton(
                                          onPressed: () {
                                            Navigator.pop(context);
                                          },
                                          child: const Text('Close'),
                                        ),
                                        TextButton(
                                          onPressed: () {
                                            setState(() {
                                              uploadedImage = null;
                                            });
                                            Navigator.pop(context);
                                            Navigator.push(
                                                context,
                                                MaterialPageRoute(
                                                    builder: (context) =>
                                                        AdminPage()));
                                          },
                                          child: const Text('Ok'),
                                        )
                                      ],
                                    );
                                  });

                              var response =
                                  await Dio().post(url, data: formData);
                            }
                          },
                          child: const Text('Tambah Data')),
                    )
                  ],
                )),
          ),
        ));
  }
}