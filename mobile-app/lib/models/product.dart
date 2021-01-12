import 'package:json_annotation/json_annotation.dart';

part 'product.g.dart';

@JsonSerializable()
class Product {
  @JsonKey(name: 'id')
  int id;

  @JsonKey(name: 'uid', nullable: true)
  String uid;

  @JsonKey(name: 'barcode')
  String barcode;

  @JsonKey(name: 'name')
  String name;

  @JsonKey(name: 'information')
  String information;

  @JsonKey(name: 'deposit_amount')
  int depositAmount;

  // @JsonKey(name: 'thumbnail_tiny_url')
  // String thumbnailTinyUrl;

  // @JsonKey(name: 'thumbnail_small_url')
  // String thumbnailSmallUrl;

  // @JsonKey(name: 'thumbnail_medium_url')
  // String thumbnailMediumUrl;

  // @JsonKey(name: 'thumbnail_large_url')
  // String thumbnailLargeUrl;

  @JsonKey(name: 'updated_at')
  String updatedAt;

  @JsonKey(name: 'created_at')
  String createdAt;

  // List<ProductLanguage> languages;

  // List<IngredientAnnotation> ingredientAnnotations;

  Product({
    this.uid,
    this.barcode,
    this.name,
    this.information,
    // this.thumbnailTinyUrl,
    // this.thumbnailSmallUrl,
    // this.thumbnailMediumUrl,
    // this.thumbnailLargeUrl,
    this.updatedAt,
    this.createdAt,
    // this.languages,
    // this.ingredientAnnotations,
  });

  factory Product.fromJson(Map<String, dynamic> json) =>
      _$ProductFromJson(json);

  Map<String, dynamic> toJson() => _$ProductToJson(this);

  String getFormattedDepositAmount() {
    double _depositAmount = 0;

    if (this.depositAmount != null) {
      _depositAmount = (this.depositAmount / 100);
    }

    return _depositAmount.toStringAsFixed(2);
  }
}
