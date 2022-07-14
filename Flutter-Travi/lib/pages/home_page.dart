import 'package:flutter/material.dart';
import 'package:travi_app/pages/login_page.dart';

class HomePage extends StatefulWidget {
  const HomePage({ Key? key }) : super(key: key);

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.white,
        title: GestureDetector(
          onTap: (() {
            Navigator.push(context, MaterialPageRoute(builder: (context) => LoginPage()));
          }),
          child: Center(
            child: Image.asset(
              'assets/images/logo.png',
              width: 100,
            ),
          ),
        ),
      ),
      body: ListView(
        children: [
          Center(
            child: Column(
              children: [
                Stack(
                  children: [
                    Image.asset(
                      'assets/images/bg_home.png',
                      width: MediaQuery.of(context).size.width,
                      height: 300,
                      fit: BoxFit.cover,
                    ),
                    Padding(
                      padding: const EdgeInsets.only(top: 40, left: 20, right: 20),
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          const SizedBox(
                            width: 250,
                            child: Text(
                              'Nikmati Suasana Pedesaan',
                              style: TextStyle(
                                fontFamily: 'Poppins',
                                fontWeight: FontWeight.w600,
                                fontSize: 20,
                                color: Colors.white,
                                letterSpacing: 1.4
                              ),
                            ),
                          ),
                          const SizedBox(height: 15),
                          const Text(
                            'Pengalaman terbaru anda berada di tempat yang jarang untuk kita kunjungi, mengenal adat dan budaya di suatu daerah',
                            style: TextStyle(
                              fontFamily: 'Poppins',
                              fontWeight: FontWeight.w500,
                              fontSize: 13,
                              color: Colors.white,
                              letterSpacing: 0.4
                            ),
                          ),
                          const SizedBox(height: 30),
                          Row(
                            children: [
                              ElevatedButton(
                                onPressed: () {},
                                child: const Padding(
                                  padding: EdgeInsets.symmetric(vertical: 8),
                                  child: Icon(
                                    Icons.search_rounded
                                  ),
                                ),
                                style: ButtonStyle(
                                  backgroundColor: MaterialStateProperty.all(Colors.green),
                                  shape: MaterialStateProperty.all(
                                    RoundedRectangleBorder(
                                      borderRadius: BorderRadius.circular(10)
                                    )
                                  )
                                ),
                              ),
                              const SizedBox(width: 12),
                              const Text(
                                'Lihat Detail',
                                style: TextStyle(
                                  fontFamily: 'Poppins',
                                  fontWeight: FontWeight.w300,
                                  fontSize: 13,
                                  color: Colors.white,
                                  letterSpacing: 0.4
                                ),
                              )
                            ],
                          )
                        ],
                      ),
                    )
                  ],
                ),
                const SizedBox(height: 40),
                Column(
                  children: [
                    const Text(
                      'Kembangkan Bisnis Anda Bersama Kami',
                      style: TextStyle(
                        fontFamily: 'Poppins',
                        fontWeight: FontWeight.w600,
                        fontSize: 14,
                        color: Colors.black,
                        letterSpacing: 0.8
                      ),
                    ),
                    const SizedBox(height: 10),
                    const Text(
                      'Travi hadir untuk meningkatkan bisnis anda',
                      style: TextStyle(
                        fontFamily: 'Poppins',
                        fontWeight: FontWeight.w400,
                        fontSize: 11,
                        color: Colors.black,
                        letterSpacing: 0.8
                      ),
                    ),
                    const SizedBox(height: 20),
                    ElevatedButton(
                      onPressed: () {},
                      child: const Padding(
                        padding: EdgeInsets.symmetric(vertical: 12, horizontal: 8),
                        child: Text(
                          'Mulai Sekarang',
                          style: TextStyle(
                            fontWeight: FontWeight.w600,  
                            letterSpacing: 0.5
                          ),
                        ),
                      ),
                      style: ButtonStyle(
                        backgroundColor: MaterialStateProperty.all(Colors.green),
                        shape: MaterialStateProperty.all(
                          RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(10)
                          )
                        )
                      ),
                    )
                  ],
                ),
                const SizedBox(height: 50),
                Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 20),
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.spaceEvenly,
                    children: [
                      Column(
                        children: const [
                          CircleAvatar(
                            backgroundImage: AssetImage('assets/images/tana_toraja.png'),
                            radius: 50,
                          ),
                          SizedBox(height: 10),
                          Text('Tana Toraja')
                        ],
                      ),
                      Column(
                        children: const [
                          CircleAvatar(
                            backgroundImage: AssetImage('assets/images/pecak.png'),
                            radius: 50,
                          ),
                          SizedBox(height: 10),
                          Text('Tari Pecak')
                        ],
                      ),
                      Column(
                        children: const [
                          CircleAvatar(
                            backgroundImage: AssetImage('assets/images/larung_sesaji.png'),
                            radius: 50,
                          ),
                          SizedBox(height: 10),
                          Text('Larung Sesaji')
                        ],
                      )
                    ],
                  ),
                ),
                const SizedBox(height: 20)
              ],
            ),
          ),
        ],
      )
    );
  }
}