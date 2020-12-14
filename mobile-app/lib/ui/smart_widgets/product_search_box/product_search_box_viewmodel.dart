import 'package:stacked/stacked.dart';

class ProductSearchBoxViewModel extends BaseViewModel {
  bool showClearButton = false;

  void setShowClearButton(bool value) {
    showClearButton = value;

    notifyListeners();
  }
}
