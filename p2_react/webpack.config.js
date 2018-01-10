const path = require('path');
const webpack = require('webpack');

const HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require("extract-text-webpack-plugin");

// .concat(process.env.NODE_ENV === 'production' ? [
//     	new webpack.optimize.DedupePlugin(),
//     	new webpack.optimize.OccurrenceOrderPlugin(),
//     	new webpack.optimize.UglifyJsPlugin()
//  	] : []),

module.exports = {
	entry: './src/index.js',
	output: {
		path: path.resolve(__dirname, 'build'),
		filename: 'bundle.js'
	},
	module: {
		rules: [
			{
				test: /\.(js|jsx)$/,
				loader: 'babel-loader',
				query: {
					presets: ['es2017', 'react', 'stage-0']
				}
			},
			{
				test: /\.css$/,
				use: ExtractTextPlugin.extract({
					fallback: "style-loader",
					use: "css-loader"
				})
			},
			{
		    	test: /\.woff(\?v=\d+\.\d+\.\d+)?$/,
		    	loader: 'url-loader?limit=10000&mimetype=application/font-woff',
		    },
		    {
		    	test: /\.woff2(\?v=\d+\.\d+\.\d+)?$/,
		    	loader: 'url-loader?limit=10000&mimetype=application/font-woff',
		    },
		    {
		    	test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/,
		    	loader: 'url-loader?limit=10000&mimetype=application/octet-stream',
		    },
		    {
		    	test: /\.eot(\?v=\d+\.\d+\.\d+)?$/,
		    	loader: 'file-loader',
		    },
		    {
		    	test: /\.svg(\?v=\d+\.\d+\.\d+)?$/,
		    	loader: 'url-loader?limit=10000&mimetype=image/svg+xml',
		    },
			{
				test: /\.(png|jpg|gif)$/,
				use: [
					{ 
						loader: 'url-loader',
						options: {
							name: 'images/[name].[ext]',
							limit: 8192
						}
					}	
				]
			}
		]
	},
	plugins: [
		new HtmlWebpackPlugin({
			title: "Circle The Cat Solver",
			template: path.join(__dirname, "index.html"),
			inject: 'body'
		}),
		new ExtractTextPlugin("styles.css"),
	],
	stats: {
		colors: true
	},
	devtool: 'source-map'
}