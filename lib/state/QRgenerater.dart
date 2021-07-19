import 'package:flutter/material.dart';
import 'package:qr_flutter/qr_flutter.dart';

class QRGen extends StatefulWidget {
  const QRGen({Key? key}) : super(key: key);

  @override
  _QRGenState createState() => _QRGenState();
}

class _QRGenState extends State<QRGen> {
  final controller = TextEditingController();
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Generater'),
        backgroundColor: Colors.transparent,
        
      ),
      body: Center(
        child: SingleChildScrollView(
          padding: EdgeInsets.all(24),
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              QrImage(
                data: controller.text,
                size: 200,
                backgroundColor: Colors.white,
              ),
              SizedBox(height: 40),
              buildTextField(context),
            ],
          ),
        ),
      ),
    );
    }
  Widget buildTextField(BuildContext context) => TextField(
    controller: controller,
    style: TextStyle(
      color: Colors.black,
      fontWeight:  FontWeight.bold,
      fontSize: 20,
    ),
    decoration: InputDecoration(
     hintText: 'ใส่ลิงก์หรือข้อมูลที่นี่',
     hintStyle: TextStyle(color: Colors.grey),
     enabledBorder: OutlineInputBorder(
       borderRadius: BorderRadius.circular(8),
       borderSide: BorderSide(color: Colors.green),
       ),
       focusedBorder: OutlineInputBorder(
         borderRadius: BorderRadius.circular(8),
         borderSide: BorderSide(
           color: Theme.of(context).accentColor,
           ),
         ),
         suffixIcon: IconButton(
           color: Theme.of(context).accentColor,
           icon: Icon(Icons.qr_code ,size: 30),
           onPressed: () => setState(() {}),
           )
     ),
  );
}
