import 'package:clipboard/clipboard.dart';
import 'package:flutter/material.dart';
// ignore: import_of_legacy_library_into_null_safe
import 'package:speech_recognition/speech_recognition.dart';
import 'package:webview_flutter/webview_flutter.dart';
//import 'package:http/http.dart' as http;

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Speech(),
    );
  }
}

class Speech extends StatefulWidget {
  @override
  _SpeechState createState() => _SpeechState();
}

/*class WebService {
  static callWeb() async {
    var url = Uri.parse('https://example.com/whatsit/create');
var response = await http.post(url, body: {'name': 'doodle', 'color': 'blue'});
print('Response status: ${response.statusCode}');
print('Response body: ${response.body}');

print(await http.read('https://example.com/foobar.txt'));
  }
}*/

class _SpeechState extends State<Speech> {
  late SpeechRecognition _speechRecognition;
  bool _isAvailable = false;
  bool _isListening = false;

  String resultText = "กดปุ่มเพื่อพูด";

  @override
  void initState() {
    super.initState();
    initSpeechRecognizer();
    WebView.platform = SurfaceAndroidWebView();
  }

  void initSpeechRecognizer() {
    _speechRecognition = SpeechRecognition();

    _speechRecognition.setAvailabilityHandler(
      (bool result) => setState(() => _isAvailable = result),
    );

    _speechRecognition.setRecognitionStartedHandler(
      () => setState(() => _isListening = true),
    );

    _speechRecognition.setRecognitionResultHandler(
      (String speech) => setState(() => resultText = speech),
    );

    _speechRecognition.setRecognitionCompleteHandler(
      () => setState(() => _isListening = false),
    );

    _speechRecognition.activate().then(
          (result) => setState(() => _isAvailable = result),
        );
  }

  Future<void> text_to_page(String resultTextto) async {

    if (resultTextto == 'หน้าหลัก' || resultTextto == 'น่ารัก') {
      setState(() {
        Widget build(BuildContext context) {
          return WebView(
            initialUrl: 'https://flutter.dev/',
          );
        }
      });
      
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Speech to Text'),
        centerTitle: true,
        actions: [
          Builder(
              builder: (context) => IconButton(
                    icon: Icon(Icons.content_copy),
                    onPressed: () async {
                      await FlutterClipboard.copy(resultText);

                      // ignore: deprecated_member_use
                      Scaffold.of(context).showSnackBar(
                        SnackBar(content: Text('copy to Clipboard')),
                      );
                    },
                  ))
        ],
      ),
      body: Container(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: <Widget>[
            Container(
              height: 500,
              width: MediaQuery.of(context).size.width * 0.8,
              decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.circular(6.0),
              ),
              padding: EdgeInsets.symmetric(
                vertical: 8.0,
                horizontal: 12.0,
              ),
              child: Text(
                resultText,
                style: TextStyle(fontSize: 30),
              ),
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: <Widget>[
                FloatingActionButton(
                  child: Icon(Icons.cancel),
                  mini: true,
                  backgroundColor: Colors.deepOrange,
                  onPressed: () {
                    if (_isListening)
                      _speechRecognition.cancel().then(
                            (result) => setState(() {
                              _isListening = result;
                              resultText = " ";
                            }),
                          );
                  },
                ),
                FloatingActionButton(
                  child: Icon(Icons.mic),
                  onPressed: () {
                    if (_isAvailable && !_isListening) {
                      _speechRecognition
                          .listen(locale: "th_TH")
                          .then((result) => print('$result'));
                        print(resultText);
                        text_to_page(resultText); 
                    }
                  },
                  backgroundColor: Colors.pink,
                ),
                FloatingActionButton(
                  child: Icon(Icons.stop),
                  mini: true,
                  backgroundColor: Colors.deepPurple,
                  onPressed: () {
                    if (_isListening)
                      _speechRecognition.stop().then(
                            (result) => setState(() => _isListening = result),
                          );
                  },
                ),
              ],
            ),
          ],
        ),
      ),
    );
  }
}
