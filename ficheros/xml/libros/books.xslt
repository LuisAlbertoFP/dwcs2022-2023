<?xml version="1.0"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
  <xsl:template match="/">
    <HTML>
      <HEAD>
        <TITLE>Listado de libros</TITLE>
      </HEAD>
      <BODY>
        <h2>Listado de libros</h2>
        <table border="1">
          <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Price</th>
            <th>Publish Date</th>
            <th>Description</th>
          </tr>
          <xsl:for-each select="catalog/book">
              <tr>
                <td><xsl:value-of select="./@id" /></td>
                <td><xsl:value-of select="author"/></td>
                <td><xsl:value-of select="title"/></td>
                <td><xsl:value-of select="genre"/></td>
                <td><xsl:value-of select="price"/></td>
                <td><xsl:value-of select="publish_date"/></td>
                <td><xsl:value-of select="description"/></td>
              </tr>
          </xsl:for-each>
        </table>        
      </BODY>
    </HTML>
  </xsl:template>
</xsl:stylesheet>