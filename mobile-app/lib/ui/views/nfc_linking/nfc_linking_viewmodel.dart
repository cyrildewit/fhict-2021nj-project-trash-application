import 'package:injectable/injectable.dart';
import 'package:stacked/stacked.dart';
import 'package:meta/meta.dart';

const String NfcLinkingBusyKey = 'nfc-linking-key';

@singleton
class NfcLinkingViewModel extends BaseViewModel {
  Future initialise() async {
    setBusyForObject(NfcLinkingBusyKey, true);

    await justWait(numberOfSeconds: 5);

    setBusyForObject(NfcLinkingBusyKey, false);
  }

  Future justWait({@required int numberOfSeconds}) async {
    await Future.delayed(Duration(seconds: numberOfSeconds));
  }
}
