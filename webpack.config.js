const path = require('path');
const TerserPlugin = require('terser-webpack-plugin');

module.exports = {
  mode: 'production', // 本番用（開発ならdevelopment（圧縮されない））
  entry: './src/js/app.js', // バンドル前のやつのエントリポイント
  output: { // バンドル先
    filename: 'bundle.js',
    path: path.join(__dirname, 'public/dist/js')
  },
  optimization: {
    minimizer: [ // js圧縮
      new TerserPlugin({
        extractComments: 'all', // コメント削除
        terserOptions: {
          compress: {
            // drop_console: true, // console.log削除
          },
        },
      }),
    ],
  }
};
