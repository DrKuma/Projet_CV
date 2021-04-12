import React, { Component } from "react";
import * as firebase from 'firebase';
import {
    BrowserRouter as  Link
  } from "react-router-dom";
import {DB_CONFIG} from './Config/Config';

class Home extends Component {
    constructor(){
        super()
    
          this.state = {loading: true }
          if (!firebase.apps.length) {
            firebase.initializeApp(DB_CONFIG);
        }
        
    }

    
    componentDidMount () {
        const articlesRef = firebase.database().ref('Articles')

        articlesRef.on('value', snapshot => {
            this.setState({
                Articles: snapshot.val(),
                loading: false
            })
        })
    }
    
      
    render() {
        if (this.state.loading){
            return (
                <p>Chargement des articles</p>
            )
        }
        const Articles = Object.keys(this.state.Articles).map(key => {
            
        return <div><h1 key={key}>{this.state.Articles[key].titre}</h1>
                    <p key={key}>{this.state.Articles[key].resume}</p>
                    <Link to={`/Article_${key}`}>Plus</Link>
                </div>
        })
      return (
      <div>{Articles}</div>
      )
    }
    
}

 
export default Home;