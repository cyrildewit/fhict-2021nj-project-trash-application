import 'package:json_annotation/json_annotation.dart';

part 'user.g.dart';

@JsonSerializable()
class User {
  String uuid;

  String name;

  String email;

  @JsonKey(name: 'avatar_tiny_url')
  String avatarTinyUrl;

  @JsonKey(name: 'balance')
  int balance;

  @JsonKey(name: 'updated_at')
  String updatedAt;

  @JsonKey(name: 'created_at')
  String createdAt;

  User({
    this.uuid,
    this.name,
    this.email,
    this.avatarTinyUrl,
    this.balance,
    this.updatedAt,
    this.createdAt,
  });

  factory User.fromJson(Map<String, dynamic> json) => _$UserFromJson(json);

  Map<String, dynamic> toJson() => _$UserToJson(this);

  String getFormattedBalance() {
    double _balance = 0;

    if (this.balance != null) {
      _balance = (this.balance / 100);
    }

    return _balance.toStringAsFixed(2);
  }
}
