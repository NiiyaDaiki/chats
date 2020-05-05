import sys
print(sys.version)
# sys.path.append('/var/www/app/Python/env/lib/python3.5/site-packages')
# print(sys.path)
import numpy as np
import cv2

print('image.binarization.py START')
# IMAGE_SIZE = 72    # 画像サイズ

# #コマンドライン引数を取得
# args = sys.argv

# # 画像読み込み
# inputNum = 1
# for count in range(int(inputNum)):
#     fileName = args[1]
#     print('fileName:' + fileName)

#     # 画像読み込み
#     image = cv2.imread(fileName, cv2.IMREAD_GRAYSCALE)
#     if not image is None:
#         # image = cv2.resize(image, (IMAGE_SIZE, IMAGE_SIZE))
#         # 二値化(閾値は大津の2値化法による自動設定)
#         ret2, img_otsu = cv2.threshold(image, 0, 255, cv2.THRESH_OTSU)
#         #閾値がいくつになったか確認
        # print("ret2: {}".format(ret2))
        # cv2.imwrite(fileName, img_otsu)

print('image.binarization.py END')
