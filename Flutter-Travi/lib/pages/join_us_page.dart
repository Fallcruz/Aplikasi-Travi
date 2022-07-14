import 'dart:convert';
import 'dart:developer';
import 'dart:io';
import 'dart:ui';
import 'package:dio/dio.dart';

import 'package:flutter/material.dart';
import 'package:flutter_dotenv/flutter_dotenv.dart';
import 'package:image_picker/image_picker.dart';
import 'package:http/http.dart' as http;

class JoinUsPage extends StatefulWidget {
  const JoinUsPage({Key? key}) : super(key: key);

  @override
  State<JoinUsPage> createState() => _JoinUsPageState();
}

class _JoinUsPageState extends State<JoinUsPage> {
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();
  final namaController = TextEditingController();
  final namaPaketController = TextEditingController();
  final emailController = TextEditingController();
  final nomorTeleponController = TextEditingController();
  final alamatController = TextEditingController();
  final kegiatanWisataController = TextEditingController();
  final deskripsiController = TextEditingController();
  final durasiController = TextEditingController();
  final pelayananController = TextEditingController();
  final hargaController = TextEditingController();

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
          backgroundColor: Colors.white,
          title: const Center(
            child: Text(
              'Join Us',
              style: TextStyle(
                  color: Colors.green,
                  fontSize: 20,
                  fontFamily: 'Poppins',
                  fontWeight: FontWeight.bold),
            ),
          ),
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
                          'Kembangkan Bisnis Anda Bersama Kami',
                          textAlign: TextAlign.center,
                          style: TextStyle(
                              fontSize: 17,
                              fontWeight: FontWeight.bold,
                              fontFamily: 'Poppins',
                              color: Colors.black),
                        ),
                      ),
                    ),

                    Center(
                      child: Container(
                        margin: const EdgeInsets.only(bottom: 16),
                        child: const Text(
                          'Travi hadir untuk meningkatkan bisnis anda',
                          textAlign: TextAlign.center,
                          style: TextStyle(
                              fontSize: 14,
                              fontWeight: FontWeight.w200,
                              fontFamily: 'Poppins',
                              color: Colors.black),
                        ),
                      ),
                    ),
                    TextFormField(
                      controller: namaController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Nama/Nama Perusahaan tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'Nama/Nama Perusahaan',
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
                      controller: namaPaketController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Nama Paket Tour tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'Nama Paket Tour',
                          contentPadding: EdgeInsets.all(5),
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
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
                      controller: emailController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Email tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'Email',
                          contentPadding: EdgeInsets.all(5),
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
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
                      controller: nomorTeleponController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'No.Telepon tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'No.Telepon',
                          contentPadding: EdgeInsets.all(5),
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
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
                      controller: alamatController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Alamat tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'Alamat',
                          contentPadding: EdgeInsets.all(5),
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
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
                      controller: kegiatanWisataController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Kegiatan Wisata tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'Kegiatan Wisata',
                          contentPadding: EdgeInsets.all(5),
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
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
                          contentPadding: EdgeInsets.all(5),
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
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
                      controller: pelayananController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Pelayanan tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'Pelayanan',
                          contentPadding: EdgeInsets.all(5),
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
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
                      controller: durasiController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Durasi tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'Durasi',
                          contentPadding: EdgeInsets.all(5),
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
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
                      controller: hargaController,
                      validator: (value) {
                        if (value == null || value.isEmpty) {
                          return 'Harga tidak boleh kosong';
                        }
                        return null;
                      },
                      decoration: const InputDecoration(
                          hintText: 'Harga',
                          focusedErrorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
                          errorBorder: OutlineInputBorder(
                              borderSide: BorderSide(color: Colors.red)),
                          contentPadding: EdgeInsets.all(5),
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
                                  '${dotenv.env['URL']}/api/tour-package';
                    
                              String fileName =
                                  uploadedImage!.path.split('/').last;
                              var map = new Map<String, dynamic>();
                              map['nama'] = namaController.text;
                              map['nama_paket'] = namaPaketController.text;
                              map['email'] = emailController.text;
                              map['nomor_telepon'] = nomorTeleponController.text;
                              map['alamat'] = alamatController.text;
                              map['kegiatan_wisata'] =
                                  kegiatanWisataController.text;
                              map['deskripsi'] = deskripsiController.text;
                              map['durasi'] = durasiController.text;
                              map['pelayanan'] = pelayananController.text;
                              map['harga'] = hargaController.text;
                              map['gambar'] = await MultipartFile.fromFile(
                                  uploadedImage!.path,
                                  filename: fileName);
                    
                              FormData formData = new FormData.fromMap(map);
                    
                              showDialog(
                                  context: context,
                                  builder: (ctx) {
                                    return AlertDialog(
                                      content: const Text(
                                          "Sukses Menambahkan Tour Package"),
                                      actions: [
                                        TextButton(
                                          onPressed: () {
                                            Navigator.pop(context);
                                          },
                                          child: const Text('Close'),
                                        ),
                                        TextButton(
                                          onPressed: () {
                                            namaController.text = "";
                                            namaPaketController.text = "";
                                            emailController.text = "";
                                            nomorTeleponController.text = "";
                                            alamatController.text = "";
                                            kegiatanWisataController.text = "";
                                            deskripsiController.text = "";
                                            durasiController.text = "";
                                            pelayananController.text = "";
                                            hargaController.text = "";
                                            setState(() {
                                              uploadedImage = null;
                                            });
                                            Navigator.pop(context);
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
                          child: const Text('Mulai Sekarang')),
                    )
                  ],
                )),
          ),
        ));
  }
}
