import React from 'react';
import BlogPostList from "./BlogPostList";
import {blogPostListFetch, blogPostListSetPage} from "../actions/actions";
import {connect} from "react-redux";
import {Spinner} from "./Spinner";
import {Paginator} from "./Paginator";

const mapStateToProps = state => ({
  ...state.blogPostList
});

const mapDispatchToProps = {
  blogPostListFetch, blogPostListSetPage
};

class BlogPostListContainer extends React.Component {
  componentDidMount() {

  }

  componentDidUpdate(prevProps) {

  }



  render() {

    return (
      <div>
        ghggu

      </div>
    )
  }
}

export default connect(mapStateToProps, mapDispatchToProps)(BlogPostListContainer);
