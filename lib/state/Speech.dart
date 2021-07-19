
import 'package:speech_to_text/speech_to_text.dart' as stt;
import 'package:avatar_glow/avatar_glow.dart';
import 'package:clipboard/clipboard.dart';
import 'package:flutter/material.dart';


class Speech extends StatefulWidget {
  Speech({Key? key}) : super(key: key);
  
  @override
  _SpeechState createState() => _SpeechState();
}


class _SpeechState extends State<Speech> {
  stt.SpeechToText _speech = stt.SpeechToText();

  bool _isListening = false;
  String _textSpeech = 'Press the Key';

  void onListen() async {
    if(!_isListening){
      bool avaliable = await _speech.initialize(
        onStatus: (val) => print('onStatus: $val'),
        onError: (val) => print('onError: $val')
      );
      if (avaliable){
        setState(() {
          _isListening = true;
        });
        _speech.listen(
          onResult: (val) => setState(() {
            _textSpeech = val.recognizedWords;
           
          })

        );
      }
      else{
        setState(() {
          _isListening = false;
          _speech.stop();
        });
      }
      
    }
  }

  @override
  void initState() { 
    super.initState();
    _speech = stt.SpeechToText();
  }
  
  

  @override
  Widget build(BuildContext context) => Scaffold(
    appBar: AppBar(
      title: Text('Speech to Text'),
      centerTitle: true,
      actions: [
        Builder(builder: 
        (context)=>IconButton(
           icon: Icon(Icons.content_copy),
          onPressed: () async {
            await FlutterClipboard.copy(_textSpeech);

            // ignore: deprecated_member_use
            Scaffold.of(context).showSnackBar(
              SnackBar(content: Text('copy to Clipboard')),
              );
          },
        ))
       
      ],
    ),
    floatingActionButtonLocation: FloatingActionButtonLocation.centerFloat,
      floatingActionButton: AvatarGlow(
        animate: _isListening,
        endRadius: 75,
        glowColor: Theme.of(context).primaryColor,
        duration: Duration(milliseconds: 2000),
        repeatPauseDuration: Duration(milliseconds: 100),
        repeat: true,
        child: FloatingActionButton(
          onPressed: () => onListen(),
          child: Icon(_isListening ? Icons.mic: Icons.mic_none,size: 36),
        
        )
       
        
        ),
    body: SingleChildScrollView(
      reverse: true,
      child: Container(
        padding: EdgeInsets.fromLTRB(25, 25, 25, 150),
        child: Text(
        _textSpeech,
        style: TextStyle(
          fontSize: 32.0,
          color: Colors.black,
          fontWeight: FontWeight.w400,
        ),
      ),
      )
      
      
      ),
      
        
  );
 


}
