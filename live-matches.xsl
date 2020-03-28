<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

  <xsl:template match="/">

    <xsl:for-each select="matches/matche">
      <div class="matche">
        <a class="contain">
          <xsl:attribute name="href">matche.php?id=<xsl:value-of select="id" /></xsl:attribute>
          <img class="team_a"> 
            <xsl:variable name="id" select="team_a/@id"/>
            <xsl:attribute name="src">
              <xsl:value-of select="document( concat( 'data/teams/team-', $id, '.xml') )/team/image"/>
            </xsl:attribute>
          </img>          
          
          <xsl:if test="status = 'Playing'">
            <b class="blink"><xsl:value-of select="team_a/time" /> '</b>
          </xsl:if>
          <div class="score_">
            <span>
              <xsl:choose>
                <xsl:when test="status = 'Played' or status = 'Playing'">
                  <xsl:value-of select="team_a/@score" /> - <xsl:value-of select="team_b/@score" />
                </xsl:when>
                <xsl:otherwise>
                  <xsl:value-of select="time" />
                </xsl:otherwise>
              </xsl:choose>
            </span>
          </div>

          <img class="team_b"> 
            <xsl:variable name="id" select="team_b/@id"/>
            <xsl:attribute name="src">
              <xsl:value-of select="document( concat( 'data/teams/team-', $id, '.xml') )/team/image"/>
            </xsl:attribute>
          </img>

        </a>
      </div>
    </xsl:for-each>

  </xsl:template>

</xsl:stylesheet> 