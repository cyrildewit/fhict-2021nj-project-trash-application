import 'package:json_annotation/json_annotation.dart';

part 'login_response.g.dart';

@JsonSerializable()
class LoginResponse {
  @JsonKey(name: 'access_token')
  String accessToken;

  @JsonKey(name: 'token_type')
  String tokenType;

  @JsonKey(name: 'expires_in')
  int expiresIn;

  LoginResponse({
    this.accessToken,
    this.tokenType,
    this.expiresIn,
  });

  factory LoginResponse.fromJson(Map<String, dynamic> json) =>
      _$LoginResponseFromJson(json);

  Map<String, dynamic> toJson() => _$LoginResponseToJson(this);
}
