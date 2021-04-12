import React, { Component } from "react";
import {
    Route,
    NavLink,
    HashRouter
  } from "react-router-dom";
  import Home from "./Home";
import Article_1 from "./Articles/Article_1";
import Article_2 from "./Articles/Article_2";
import Article_3 from "./Articles/Article_3";
import Article_4 from "./Articles/Article_4";

 
class Main extends Component {
  render() {
    return (
        <HashRouter>
        <div>
          <h1>Site de news</h1>
          <ul className="header">
          <li><NavLink exact to="/">Home</NavLink></li>
          </ul>
          <div className="content">
            <Route exact path="/" component={Home}/>
            <Route exact path="/article_0" component={Article_1}/>
            <Route exact path="/article_1" component={Article_2}/>
            <Route exact path="/article_T4STRCd2dFFgJl2QzxhZ" component={Article_3}/>
            <Route exact path="/article_ia9vXzKgnGHzWgPCTWvY" component={Article_4}/>
             
          </div>
        </div>
        </HashRouter>
    );
  }
}
 
export default Main;