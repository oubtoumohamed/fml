<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">
    <div class="competitions">
      <h2>أهم الدوريات </h2>
      <ul class="">
        <xsl:for-each select="competitions/competition">
        <li>
          <a>
            <xsl:attribute name="href">competition.php?id=<xsl:value-of select="id" /></xsl:attribute>
            <img>
              <xsl:attribute name="src">
                <xsl:value-of select="image" />
              </xsl:attribute>
            </img>
            <b><xsl:value-of select="name"/></b>
          </a>
        </li>
        </xsl:for-each>
        <div class="clear"></div>
      </ul>
    </div>
  </xsl:template>

</xsl:stylesheet> 