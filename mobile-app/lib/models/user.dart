import 'package:json_annotation/json_annotation.dart';

part 'user.g.dart';

@JsonSerializable()
class User {
  int id;

  @JsonKey(name: 'updated_at')
  String updatedAt;

  @JsonKey(name: 'created_at')
  String createdAt;

  User({
    this.id,
    this.updatedAt,
    this.createdAt,
    // this.languages,
  });

  factory User.fromJson(Map<String, dynamic> json) => _$UserFromJson(json);

  Map<String, dynamic> toJson() => _$UserToJson(this);
}
